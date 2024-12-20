<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class UserHomeController extends Controller
{
    public function index(Request $request)
    {
        // Initial load of first 3 blogs
        $blogs = Blog::latest()->take(5)->get();
        return view('users.home.index', compact('blogs'));
    }

    // public function loadMore(Request $request)
    // {
    //     // API endpoint to fetch next 2 blogs
    //     $page = $request->get('page', 1);
    //     $blogs = Blog::latest()
    //         ->skip(3 + (($page - 1) * 2)) // Skip initial 3 and previously loaded
    //         ->take(2)
    //         ->get();

    //     return response()->json([
    //         'blogs' => $blogs
    //     ]);
    // }
}