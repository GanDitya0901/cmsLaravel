<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use App\Models\Page;
use Illuminate\Http\Request;

class PageSectionController extends Controller
{
    public function createSection(Request $request, Page $page) {
        $request->validate([
            'type' => 'string|required', 
            'content' => 'nullable|array'
        ]);

        $page->sections()->create([
            'type' => $request->type,
            'content' => $request->input('content', []), 
            'position' => $page->sections()->count() + 1

        ]);

        return redirect()->route('show.allPages');
    }

    public function editSection(PageSection $pageSection, Request $request, Page $page) {
        $pageSection->update([
            'content' => $request->input('content', [])
        ]);

        return redirect()->route('show.allPages');
    }

    public function deleteSection(PageSection $pageSection) {
        $pageSection->delete();

        return redirect()->route('show.allPages');
    }

    public function reOrder(Request $request, Page $page) {
        $ids = $request->input('sections');

        foreach($ids as $index => $id) {
            PageSection::where('id', $id)->update(['position' => $index + 1]);
        }
    }
}
