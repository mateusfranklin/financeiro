<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }

    public function index()
    {
        $categories = Category::all();
        return view('config.category', compact('categories'));
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
            $this->update($data);
            return redirect()->route('category.index');
        }

        Category::create([
            'user_id' => $this->user->id,
            'name' => $data['name'],
            'color' => $data['color'],
            'icon' => $data['icon'],
            'sub_category_of' => $data['sub_category_of'] ?? null,
        ]);

        return redirect()->route('category.index');
    }

    public function update($data)
    {
        Category::where('id', $data['update'])->update([
            'name' => $data['name'],
            'color' => $data['color'],
            'icon' => $data['icon'],
            'sub_category_of' => $data['sub_category_of'] ?? null,
        ]);
    }

    public function destroy($category_id)
    {
        Category::where('id', $category_id)->delete();
        return redirect()->route('category.index');
    }
}
