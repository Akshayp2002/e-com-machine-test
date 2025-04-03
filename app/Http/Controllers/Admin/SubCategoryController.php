<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::get();
        return view('admin.subCategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.subCategory.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
        ]);

        SubCategory::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
        ]);

        return redirect()->back()->with('success', 'Subcategory created successfully.');
    }
}
