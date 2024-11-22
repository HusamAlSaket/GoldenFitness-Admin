<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admins.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admins.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function show(Category $category)
    {
        return view('admins.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admins.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',  // Add validation for name field
            'description' => 'nullable|string|max:1000',  // Validation for description
        ]);
    
        // Update both name and description
        $category->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }
    

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
