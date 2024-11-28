<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
public function index(Request $request)
{
    $query = Product::with('category');

    if ($request->has('category') && $request->category) {
        $query->where('category_id', $request->category);
    }

    $products = $query->paginate(10);

    // Pass categories to the view
    $categories = \App\Models\Category::all();

    return view('users.products.index', compact('products', 'categories'));
}


    public function show(Product $product)
    {
        return view('users.products.show', compact('product'));
    }
}
