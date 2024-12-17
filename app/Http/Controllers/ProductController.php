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
            'image_url.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow multiple images
        ]);

        // Remove image_url from validatedData as it will not be stored in the products table
        unset($validatedData['image_url']);

        // Create a new product record
        $product = new Product($validatedData);
        $product->save(); // Save product first to get its ID

        // Check if multiple images have been uploaded
        if ($request->hasFile('image_url')) {
            foreach ($request->file('image_url') as $image) {
                // Store each image in the 'public/products' directory and get the path
                $path = $image->store('products', 'public');

                // Now, store the image in the product_images table
                ProductImage::create([
                    'product_id' => $product->id,  // Link image to the product
                    'image_url' => $path,  // Store the image path
                ]);
            }
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
    // Update a product
    public function update(Request $request, Product $product)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image_url.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow multiple images
            'delete_images.*' => 'nullable|exists:product_images,id', // Validate deleted images
        ]);
    
        // Update product details
        $product->name = $validated['name'];
        $product->description = $validated['description'] ?? $product->description;
        $product->category_id = $validated['category_id'] ?? $product->category_id;
        $product->price = isset($validated['price']) ? $validated['price'] : $product->price;
        $product->stock = $validated['stock'] ?? $product->stock;
    
        // Handle image deletions first
        if ($request->has('delete_images')) {
            $imagesToDelete = $request->input('delete_images');
            foreach ($imagesToDelete as $imageId) {
                $image = ProductImage::find($imageId);
    
                // Additional security check
                if ($image && $image->product_id === $product->id) {
                    // Delete image file from storage
                    if (\Storage::disk('public')->exists($image->image_url)) {
                        \Storage::disk('public')->delete($image->image_url);
                    }
    
                    // Delete the image record from the database
                    $image->delete();
                }
            }
        }
    
        // Handle new image uploads
        if ($request->hasFile('image_url')) {
            foreach ($request->file('image_url') as $image) {
                // Store image and get its path
                $path = $image->store('products', 'public');
    
                // Save the image to the product_images table
                $product->images()->create(['image_url' => $path]);
            }
        }
    
        // Save product updates
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
