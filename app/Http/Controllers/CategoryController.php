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
            'update' => 'required',
            'name' => 'required',
            'color' => 'nullable',
            'icon' => 'nullable',
            'sub_category_of' => 'nullable',
        ]);

        if ($data['update'] > 0) {
            $category = Category::find($data['update']);
            $category->name = $data['name'];
            $category->color = $data['color'];
            $category->icon = $data['icon'];
            $category->sub_category_of = $data['sub_category_of'] ?? null;
            $category->save();

            return redirect()->route('category.index');
        }

        Category::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'color' => $data['color'],
            'icon' => $data['icon'],
            'sub_category_of' => $data['sub_category_of'] ?? null,
        ]);

        return redirect()->route('category.index');
    }

    public function destroy( $category_id)
    {
        Category::where('id', $category_id)->delete();
        return redirect()->route('category.index');
    }
}
