<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showAllPages() {
        $pages = Page::orderBy("id","asc")->paginate(10);

        return view('pages.allPages', ['pages' => $pages]);
    }

    public function showPage($slug) {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('pages.showPage', compact('page'));
    }

    public function createForm() {
        return view('pages.createForm');
    }

    public function createPage(Request $request) {
        $validated = $request->validate([
            'title'=> 'string|min:5|max:100|unique:pages,title|required',
            'slug' => 'string|min:3|max:50|unique:pages,slug|required',
            'body' => 'required|json'
        ]);

        Page::create([
            'title'=> $validated['title'],
            'slug'=> $validated['slug'],
            'body' => json_decode($validated['body'])
        ]);

        return redirect()->route('show.allPages');
    }

    public function editForm(Page $page) {
        return view('pages.editForm', ['page'=> $page]);
    }

    public function updatePage(Request $request, Page $page) {
        $validated = $request->validate([
            'title' => 'string|required|min:5|max:100|unique:pages,title', 
            'slug'=> 'string|required|min:5|max:100|unique:pages,slug,' . $page->id,
            'body' => 'required|json'
        ]);

        $page->update([
            'title'=> $validated['title'],
            'slug'=> $validated['slug'],
            'body'=> json_decode($validated['body'])
        ]);

        return redirect()->route('show.allPages');
    }

    public function destroyPage(Page $page) {
        $page->delete();

        return redirect()->route('show.allPages');
    }
}
