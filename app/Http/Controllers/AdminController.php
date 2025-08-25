<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard() {
        $postCount = Post::whereHas("user", function($query) {
            $query->where('role', ['admin', 'master']);
        })->count();

        $categoryCount = Category::whereHas('posts')->count();

        return view('admin.adminDashboard', compact('postCount', 'categoryCount'));
    }

}
