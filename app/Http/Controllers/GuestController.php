<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class GuestController extends Controller
{
    public function landingPage(Request $request){
        $query = Post::with(['user', 'comments', 'categories'])->orderBy('created_at','desc');
        $categoryFilter = $request->categoryFilter;

        if($request->filled('categoryFilter')) {
            $query->whereHas('categories', function($q) use($categoryFilter){
                $q->where('categories.id', $categoryFilter);
            });
        }

        $posts = $query->paginate(10);
        $categories = Category::has('posts')->get();

        return view("guest.landingpage", compact('posts', 'categories'));
    }
}
