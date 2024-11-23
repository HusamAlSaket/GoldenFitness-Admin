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
        if (!in_array(Auth::user()->role, ['admin', 'superadmin'])) {
            return redirect('admins/messages'); // Or redirect to a different accessible page
        }

        return $next($request);
    }
}