<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function createComment(Request $request, Post $post) {
        $validated = $request->validate([
            'title' => 'string|min:5|max:50',
            'content' => 'string|min:5|max:200'
        ]);

        $validated['user_id'] = Auth::user()->id;
        $validated['post_id'] = $post->id;

        Comment::create($validated);

        return redirect()->route('show.post', $post->id);
    }
}
