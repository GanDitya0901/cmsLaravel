<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Colors\Rgb\Channels\Red;

class CategoryController extends Controller
{
    public function showAllCategories(Request $request) {
        $query = Category::query();
        $date = $request->dateFilter;
        $alphabetical = $request->alphabeticalFilter;

        switch ($date) {
            case "today":
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
            $query->orderBy('name', 'asc');
        } elseif($request->filled('alphabeticalFilter') && $alphabetical == 'desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->orderBy('id', 'asc');
        }

        $categories = $query->paginate(10);

        return view('category.showAllCategories', compact('categories'));
    }

    public function createForm() {
        return view('category.createForm');
    }

    public function createCategory(Request $request) {
        $validated = $request->validate([
            'name'=> 'string|max:50|unique:categories,name|required',
            'slug'=> 'string|max:50|unique:categories,slug|required',
        ]);

        Category::create($validated);

        return redirect()->route('show.allCategories');
    }

    public function editForm(Category $category) {
        return view('category.editForm', ['category' => $category]);
    }

    public function editCategory(Request $request, Category $category) {
        $validated = $request->validate([
            'name'=> 'string|max:50|required|unique:categories,name,' . $category->id, 
            'slug'=> 'string|max:50|required|unique:categories,slug,' . $category->id
        ]);

        $category->update($validated);

        return redirect()->route('show.allCategories');
    }

    public function deleteCategory(Category $category) {
        $category->delete();

        return redirect()->route('show.allCategories');
    }
}
