<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index(Request $request)
    {
        $latestBlogs = Blog::latest()->limit(5)->get();
        $generalBlogs = Blog::latest()->skip(5)->take(10)->get();
    
        if ($request->ajax()) {
            $offset = $request->input('offset', 0);
            $blogs = Blog::latest()->skip($offset)->take(3)->get();
            return response()->json($blogs);
        }
        $initialBlogs = Blog::latest()->take(3)->get();
        return view('users.blogs.index', compact('latestBlogs', 'generalBlogs','initialBlogs'));
    }
    
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('users.blogs.show', compact('blog'));
    }
    
}
