<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showAllPages() {
        $pages = Page::all();
        return view('page.showAll', compact('pages'));
    }

    public function pagePost() {
        return view('page.pageForm');
    }

    public function cretePage(Request $request) {
        $validated = $request->validate([
            'title' => 'string|min:3|max:50|unique:pages,title|required', 
            'slug' => 'string|min:3|max:50|unique:pages,slug|required'
        ]);

        Page::create($validated);

        return redirect()->route('show.allPages');
    }

    public function editForm(Page $page) {
        return view('page.editForm', ['page' => $page]);
    }

    public function editPage(Page $page, Request $request) {
        $validated = $request->validate([
            'title'=> 'string|min:3|max:50|required|unique:pages,title,' . $page->id,
            'slug' => 'string|min:3|max:50|required|unique:pages,slug,' . $page->id
        ]);

        $page->update($validated);

        return redirect()->route('show.allPages');
    }

    public function deletePage(Page $page) {
        $page->delete();

        return redirect()->route('show.allPages');
    }
}
