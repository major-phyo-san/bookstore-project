<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of categories
    public function index()
    {
        $categories = Category::all();
        return view('management.categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('management.categories.create');
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);
        // dd($validatedData);
    
        // Create a new category instance
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->save();
    
        // Redirect to the index route after successfully storing the category
        return redirect()->route('management.categories.index')
                         ->with('success', 'Category created successfully.');
    }
    

    // Show the form for editing the specified category
    public function edit(Category $category)
    {
        return view('management.categories.edit', compact('category'));
    }

    // Update the specified category in the database
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($validatedData);

        return redirect()->route('management.categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from the database
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('management.categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}