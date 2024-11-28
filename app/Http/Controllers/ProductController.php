<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::with('category', 'images')->get();
    
        // Check if products are loading with images
        // This will dump the data and stop execution so you can inspect it.
        
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation for image
        ]);
        
        // Remove image_url from validatedData as it will not be stored in the products table
        unset($validatedData['image_url']);
        
        // Create a new product record
        $product = new Product($validatedData);
        $product->save(); // Save product first to get its ID
        
        // Check if an image has been uploaded
        if ($request->hasFile('image_url')) {
            // Store the image in the 'public/products' directory and get the path
            $path = $request->file('image_url')->store('products', 'public');
            
            // Now, store the image in the product_images table
            ProductImage::create([
                'product_id' => $product->id,  // Link image to the product
                'image_url' => $path,  // Store the image path
            ]);
        }
        
        // Redirect to the products index with a success message
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
            'price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
    
        // Update product details
        $product->name = $validated['name'];
        $product->description = $validated['description'] ?? $product->description;
        $product->category_id = $validated['category_id'] ?? $product->category_id;
        $product->price = isset($validated['price']) ? intval($validated['price']) : $product->price;
        $product->stock = $validated['stock'] ?? $product->stock;
    
        // Handle new image upload
        if ($request->hasFile('image')) {
            // Store image and get its path
            $path = $request->file('image')->store('products', 'public');
    
            // Save the image to the product_images table
            $product->images()->create(['image_url' => $path]);
        }
    
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
