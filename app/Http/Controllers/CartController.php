<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        // dd($cart);
        return view('users.cart.index', compact('cart'));
    }


    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Default to 1 if no quantity provided
    
        // Retrieve the cart from the session
        $cart = session()->get('cart', []);
    
        // Check if the product already exists in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Fetch the product details
            $product = Product::findOrFail($productId);
    
            // Add product to the cart with product_id
            $cart[$productId] = [
                'product_id' => $product->id,  // Make sure product_id is added
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image_url' => $product->images->first()->image_url ?? 'placeholder.jpg', // Default image if none exists
            ];
        }
    
        // Save the updated cart back to the session
        session()->put('cart', $cart);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added to cart');
    }
    
    public function update(Request $request, $productId, $action)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$productId])) {
            if ($action === 'increase') {
                $cart[$productId]['quantity'] += 1; // Increase quantity by 1
            } elseif ($action === 'decrease' && $cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity'] -= 1; // Decrease quantity by 1 (ensure quantity doesn't go below 1)
            }
        }
    
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated');
    }
    

    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'product removed from cart');
    }
}
