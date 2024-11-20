<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Assuming you have a Category model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::all(); // Fetch all products
        return view('admins.products.index', compact('products'));
    }

    // Show form to create a new product
    public function create()
    {
        $categories = Category::all(); // Fetch all categories for the select dropdown
        return view('admins.products.create', compact('categories'));
    }

    // Store a newly created product
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'price' => 'nullable', // Removed 'numeric' validation rule
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id', // Assuming category is required
        ]);

        // Create product
        Product::create($request->all());

        // Redirect to the products index with success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Display a specific product
    public function show(Product $product)
    {
        return view('admins.products.show', compact('product'));
    }

    // Show form to edit an existing product
    public function edit(Product $product)
    {
        $categories = Category::all(); // Fetch categories for the select dropdown
        return view('admins.products.edit', compact('product', 'categories'));
    }

    // Update a product
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'nullable|numeric|min:0', // Allowing null price
            'stock' => 'nullable|integer|min:0', // Allowing null stock
            'category_id' => 'nullable|exists:categories,id', // Make sure the category exists
        ]);
    
        // Update the product with the validated data
        $product->update($request->all());
    
        // Redirect back to the products index page with success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    

    // Delete a product
    public function destroy(Product $product)
    {
        $product->delete(); // Delete the product
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
