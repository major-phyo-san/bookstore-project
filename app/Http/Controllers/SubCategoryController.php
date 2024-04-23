<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all(); // Corrected variable name
        return view('management.subcategories.index', compact('subcategories')); // Corrected variable name
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:sub_categories',
        ]);

        $subCategory = new SubCategory();
        $subCategory->name = $validatedData['name'];
        $subCategory->save();

        return redirect()->route('management.subcategories.index')
                         ->with('success', 'Subcategory created successfully.');
    }
    
    public function edit(SubCategory $subCategory)
    {
        return view('management.subcategories.edit', compact('subCategory'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:sub_categories,name,' . $subCategory->id,
        ]);

        $subCategory->update($validatedData);

        return redirect()->route('management.subcategories.index')
                         ->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(SubCategory $subCategory)
    {   
        $subCategory->delete();

        return redirect()->route('management.subcategories.index')
                         ->with('success', 'Subcategory deleted successfully.');
    }
}
