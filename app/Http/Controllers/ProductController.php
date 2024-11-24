<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::with('category')->get(); // Assuming 'category' is a relation in your Product model
        $categories = Category::all();
    
        return view('admins.products.index', compact('products', 'categories'));
    }
    

    // Show form to create a new product
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('admins.products.create', compact('categories'));
    }

    // Store a newly created product
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            // 'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $product = new Product($validatedData);
        
        // if ($request->hasFile('image_url')) {
        //     $path = $request->file('image_url')->store('products', 'public');
        //     $product->image_url = $path;
        // }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }
    
    
    
    
    // Display a specific product
    public function show(Product $product)
    {
        return view('admins.products.show', compact('product'));
    }

    // Show form to edit an existing product
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admins.products.edit', compact('product', 'categories'));
    }

    // Update a product
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'nullable|numeric|min:0', // Validate as numeric
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ]);
    
        // Update the product's attributes, converting price to integer cents
        $product->name = $validated['name'];
        $product->description = $validated['description'] ?? $product->description;
        $product->category_id = $validated['category_id'] ?? $product->category_id;
        $product->price = isset($validated['price']) ? intval($validated['price']) : $product->price; // Convert to integer cents
        $product->stock = $validated['stock'] ?? $product->stock;
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete a product
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
