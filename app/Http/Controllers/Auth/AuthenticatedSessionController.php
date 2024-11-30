<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Save the current cart data
        $cart = session()->get('cart', []);
    
        $request->authenticate();
    
        // Regenerate the session (required for security)
        $request->session()->regenerate();
    
        // Restore the cart data
        session()->put('cart', $cart);
    
        // Redirect based on role
        switch ($request->user()->role) {
            case 'superadmin':
                return redirect('admins/users');
            case 'admin':
                return redirect('admins/dashboard');
            case 'coach':
                return redirect('admins/videos');
            default:
                // Redirect to the intended URL or fallback to the products page
                return redirect()->intended(route('products.index'));
        }
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
