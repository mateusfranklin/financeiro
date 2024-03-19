<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, $category_id = null)
    {
        $default = null;
        // dd($request->all());
        $categories = Category::all();
        return view('category', compact('categories', 'default'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'color' => 'nullable',
            'icon' => 'nullable',
            'sub_category_of' => 'nullable',
        ]);

        Category::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'color' => $data['color'],
            'icon' => $data['icon'],
            'sub_category_of' => $data['sub_category_of'] ?? null,
        ]);

        return redirect()->route('category.index');
    }

    public function destroy(Request $request, Category $category)
    {
        dd($request, $category);
        $category->delete();
        return redirect()->route('category.index');
    }
}
