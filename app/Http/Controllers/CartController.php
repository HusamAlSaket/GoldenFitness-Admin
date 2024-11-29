<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('users.cart.index', compact('cart'));
    }
    

    public function add(Request $request){
        $productId=$request->input('product_id');
        $quantity=$request->input('quantity',1);

        // Retrieve the cart from the session 
        $cart =session()->get('cart',[]);

        // check if the product already exists in the cart

        if(isset($cart[$productId])){
            $cart[$productId]['quantity']+= $quantity;
        } else{
            $product =Product::findOrFail($productId);

            $cart[$productId] =[
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image_url' => $product->images->first()->image_url ?? 'placeholder.jpg',
            ];
        }
            session()->put('cart',$cart);
            return redirect()->back()->with('success','Product added to cart');
    }

}
