<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SupplementsController extends Controller
{
    public function index(Request $request)
    {
        $excludedCategories = ['Dumbbells', 'Barbells', 'Plates', 'Vests'];
    
        // Get IDs of the excluded categories
        $excludedCategoryIds = \App\Models\Category::whereIn('category_name', $excludedCategories)->pluck('id');
    
        $query = Product::with('category')->whereNotIn('category_id', $excludedCategoryIds);
    
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
    
        $products = $query->paginate(10);
    
        // Pass categories to the view, excluding the unwanted ones
        $categories = \App\Models\Category::whereNotIn('id', $excludedCategoryIds)->get();
    
        return view('users.supplements.index', compact('products', 'categories'));
    }
    
}
