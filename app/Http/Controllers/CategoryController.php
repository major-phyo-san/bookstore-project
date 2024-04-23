<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('management.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        // Category::create($validatedData);
        $category = new Category();
        $category->name = $validatedData['name']; // Use array syntax to access the 'name' key
        $category->save();
        return redirect()->route('management.categories.index')
                         ->with('success', 'Category created successfully.');

    }

    public function edit(Category $category)
    {
        return view('management.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($validatedData);

        return redirect()->route('management.categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('management.categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
