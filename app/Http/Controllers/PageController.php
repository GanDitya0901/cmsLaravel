<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    public function showAllPages(Request $request) {
        $query = Page::query();
        $date = $request->dateFilter;
        $alphabetical = $request->alphabeticalFilter;

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

        if($request->filled('alphabeticalFilter') && $alphabetical == 'asc') {
            $query->orderBy('title', 'asc');
        } elseif($request->filled('alphabeticalFilter') && $alphabetical == 'desc') {
            $query->orderBy('title', 'desc');
        } else {
            $query->orderby('id', 'asc');
        }

        $pages = $query->paginate(10);

        return view('page.showAll', compact('pages'));
    }

    public function pageForm() {
        return view('page.pageForm');
    }

    public function createPage(Request $request) {
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
