<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'You need to be logged in first.',
                'redirect' => route('login'),
            ], 403); // Send a response for SweetAlert handling
        }
    
        $user = Auth::user();
        $cartItems = session()->get('cart', []); // Assuming you use session-based cart
        $totalPrice = array_reduce($cartItems, function ($carry, $item) {
            return $carry + $item['price'] * $item['quantity'];
        }, 0);
    
        return view('users.checkout.index', compact('user', 'cartItems', 'totalPrice'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
    
        $user = Auth::user();
        $cartItems = session()->get('cart', []);
        if (empty($cartItems)) {
            return back()->withErrors(['cart' => 'Your cart is empty.']);
        }
    
        // Create Order
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => array_reduce($cartItems, fn($carry, $item) => $carry + $item['price'] * $item['quantity'], 0),
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'pending',
        ]);
    
        // Create Order Items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'], // Corrected key here
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
    
        // Clear Cart
        session()->forget('cart');
    
        // Redirect to the Thank You page with the Order ID
        return redirect()->route('thankyou', ['orderId' => $order->id]);
    }

    public function thankyou($orderId)
    {
        // Retrieve the order using the orderId
        $order = Order::findOrFail($orderId); // This will throw a 404 error if the order doesn't exist

        // Pass the order to the thankyou view
        return view('users.checkout.thankyou', compact('order'));
    }
}
