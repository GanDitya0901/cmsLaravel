<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Page;

class GuestController extends Controller
{
    public function showHome(Request $request, Page $pages){
        $query = Post::with(['user', 'comments', 'categories'])->orderBy('created_at','desc');
        $categoryFilter = $request->categoryFilter;

        if($request->filled('categoryFilter')) {
            $query->whereHas('categories', function($q) use($categoryFilter){
                $q->where('categories.id', $categoryFilter);
            });
        }

        $posts = $query->paginate(10);
        $categories = Category::has('posts')->get();

        return view("guest.landingpage", compact('posts', 'categories','pages'));
    }

    public function showAboutUs() {
        return view('guest.about-us');
    }

    public function showContactUs() {
        return view('guest.contact-us');
    }

    public function showGallery() {
        return view('guest.gallery');
    }
}
