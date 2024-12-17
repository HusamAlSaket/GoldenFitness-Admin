<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Review;
class UserProductController extends Controller
{
    public function index(Request $request)
    {
        $excludedCategories = ['Vitamins and Minerals', 'Amino Acids', 'Creatine', 'Mass Gainer Protein', 'Whey Protein', 'Isolate Proteins', 'Healthy Food'];
    
        // Get IDs of the excluded categories
        $excludedCategoryIds = \App\Models\Category::whereIn('category_name', $excludedCategories)->pluck('id');
    
        // Build the query to fetch products
        $query = Product::with('category')->whereNotIn('category_id', $excludedCategoryIds);
    
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
    
        $products = $query->paginate(10);
    
        // Fetch the categories to display in the view, excluding unwanted ones
        $categories = \App\Models\Category::whereNotIn('id', $excludedCategoryIds)->get();
    
        // Check if the authenticated user has purchased any products
        $userPurchasedProductIds = auth()->check()
            ? \App\Models\OrderItem::whereHas('order', function ($query) {
                $query->where('user_id', auth()->id());
            })->pluck('product_id')->toArray()
            : [];
    
        // Pass all data to the view
        return view('users.products.index', compact('products', 'categories', 'userPurchasedProductIds'));
    }
    
    

    public function show($id)
    {
        // Fetch the product with its related reviews and users
        $product = Product::with('reviews.user')->findOrFail($id);
    
        // Check if the authenticated user has purchased any products
        $userPurchasedProductIds = auth()->check()
            ? \App\Models\OrderItem::whereHas('order', function ($query) {
                $query->where('user_id', auth()->id());
            })->pluck('product_id')->toArray()
            : [];
    
        // Pass the product and purchased product IDs to the view
        return view('users.products.show', compact('product', 'userPurchasedProductIds'));
    }
    
    
}
