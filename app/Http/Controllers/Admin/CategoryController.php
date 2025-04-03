<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        Category::create(['name' => $request->name]);
        return redirect()->back()->with('success', 'Category created Successfully');
    }
}
