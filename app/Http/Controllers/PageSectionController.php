<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use App\Models\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PageSectionController extends Controller
{
    public function showSection(Request $request, Page $page) {
        $query = PageSection::with('page')->where('page_id', $page->id);
 
        $date = $request->dateFilter;
        $alphabetical = $request->alphabeticalFilter;

        switch ($date) {
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
            $query->orderBy('type', 'asc');
        } elseif($request->filled('alphabeticalFilter') && $alphabetical == 'desc') {
            $query->orderBy('type', 'desc');
        } else {
            $query->orderBy('id', 'asc');
        }

        $pageSection = $query->paginate(10);

        return view('page.section', compact('pageSection', 'page'));
    }
    
    public function createSection(Request $request, Page $page) {
        $request->validate([
            'type' => 'string|required', 
            'content' => 'nullable|array', 
            'content.file' => 'nullable|image', 
            'content.files.*' => 'nullable|image'
        ]);

        $content = $request->input('content', []);

        /* --For single image== */
        if($request->hasFile('content.file')) {
            $manager = new ImageManager(new Driver());

            $image = $manager->read($request->file('content.file'));
            $image->scale(width: 300);

            $imageName = time() . '.' . $request->file('content.file')->getClientOriginalExtension();

            $image->save(public_path('images/' . $imageName));
            
            $content['file'] = 'images/' . $imageName;
        }

        /* ==For multiple images== */
        if($request->hasFile('content.files')) {
            $manager = new ImageManager(new Driver());

            $files = [];

            foreach($request->file('content.file') as $file) {
                $image = $manager->read($file);
                $image->scale(width:300);

                $imageName = time() .'.'. $file->getClientOriginalExtension();
                $image->save(public_path('images/' . $imageName));

                $files[] = 'images/' . $imageName;
            }

            $content['files'] = $files;
        }

        $page->sections()->create([
            'type' => $request->type,
            'content' => $content, 
            'position' => $page->sections()->count() + 1, 
            'page_id' => $page->id
        ]);

        return redirect()->route('show.section', $page->id);
    }

    public function editSection(PageSection $pageSection, Request $request) {
        $pageSection->update([
            'content' => $request->input('content', [])
        ]);

        return redirect()->route('show.allPages');
    }

    public function deleteSection(Page $page, PageSection $pageSection) {
        $pageSection->delete();

        return redirect()->route('show.section', $page->id);
    }

    public function reOrder(Request $request, Page $page) {
        $ids = $request->input('sections');

        foreach($ids as $index => $id) {
            PageSection::where('id', $id)->update(['position' => $index + 1]);
        }
    }
}
