<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        // dd('middleware');
        if (!in_array(Auth::user()->role, ['admin'])) {
            return redirect('404'); // Or redirect to a different accessible page
        }

        return $next($request);
    }
}
