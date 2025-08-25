<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /* ==Display All Posts== */
    public function showAllPost(Request $request)
    {
        $query = Post::query()->orderBy("id","asc");
        $date = $request->dateFilter;
        $author = $request->authorFilter;

        switch ($date) {
            case "today":
                $query->whereDate("created_at", Carbon::now());
                break;
            case "yesterday":
                $query->whereDate("created_at", Carbon::yesterday());
                break;
            case "this_week":
                $query->whereBetween("created_at", [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
        }

        if($request->filled('authorFilter')) {
            $query->where('user_id', $author);
        }

        $posts = $query->paginate(10);

        $authors = User::has('posts')->get();

        return response()->view('post.showAllPost', compact('posts', 'authors'));
    }

    /* ==Render Create Post Form== */
    public function postForm(Post $post)
    {
        $user = User::find(Auth::user()->id);
        $categories = Category::all();

        return view('post.postForm', compact('user','categories', 'post'));
    }

    /* ==Store New Post in the DB== */
    public function createPost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|unique:posts,title|min:5|required',
            'content' => 'string|min:5|max:500|required',
            'filename' => 'nullable|image|mimes:jpg,jpeg,gif,png',
            'categories' => 'required|array', 
            'categories.*' => 'exists:categories,id'
        ]);

        if ($request->hasFile('filename')) {
            $manager = new ImageManager(new Driver());

            /* ==Create the Image Manager Instance== */
            $image = $manager->read($request->file('filename'));
            $image->scale(width: 300);

            /* ==Generate Unique File Name== */
            $imageName = time() . '.' . $request->file('filename')->getClientOriginalExtension();

            $image->save(public_path('images/' . $imageName));

            $validated['filename'] = 'images/' . $imageName;
        }

        $validated['user_id'] = Auth::user()->id;

        /* dd($request->categories); */

        $newPost = Post::create($validated);

        $newPost->categories()->attach($request->categories);

        return redirect()->route('show.allPost');
    }

    /* ==Render Single Post== */
    public function showPost(Post $post, Request $request)
    {
        $post->load(['user', 'comments.user', 'categories'])->get();
        $query = $post->comments()->with('user');
        $date = $request->dateFilter;

        switch($date) {
            case 'today':
                $query->whereDate('created_at', Carbon::now());
                break;
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'this_week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
        }

        $comments = $query->get();

        return response()->view('post.post', compact('post', 'comments'));
    }

    /* ==Render Edit Form== */
    public function editForm(Post $post)
    {
        $user = User::find(Auth::user()->id);
        $categories = Category::all();

        return view('post.editForm', compact('post', 'user', 'categories'));
    }

    /* ==Update Post== */
    public function editPost(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'string|min:5|unique:posts,title,' . $post->id,
            'content' => 'string|min:5|max:500|',
            'filename' => 'nullable|image|mimes:jpg,jpeg,gif,png',
            'categories' => 'required|array', 
            'categories.*' => 'exists:categories,id'
        ]);

        if ($request->hasFile('filename')) {

            if ($post->filename && file_exists(public_path($post->filename))) {
                unlink(public_path($post->filename));
            }

            $manager = new ImageManager(new Driver());

            $image = $manager->read($request->file('filename'));
            $image->scale(width: 300);

            $imageName = time() . '.' . $request->file('filename')->getClientOriginalExtension();

            $image->save(public_path('images/' . $imageName));

            $validated['filename'] = 'images/' . $imageName;
        }

        $post->update($validated);

        $post->categories()->sync($request->categories);

        return redirect()->route('show.allPost');
    }

    /* ==Destroy Post== */
    public function deletePost(Post $post)
    {
        if ($post->filename && file_exists(public_path($post->filename))) {
            unlink(public_path($post->filename));
        }

        $post->delete();

        return redirect()->route('show.allPost');
    }
}
