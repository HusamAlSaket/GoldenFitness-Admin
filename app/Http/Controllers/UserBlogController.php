<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index(){
        $blogs=Blog::latest()->paginate(10);
        return view('users.blogs.index',compact('blogs'));
        
    }
    public function show($id)
    {
        $blog = Blog::findOrFail($id); // Find the blog by ID or fail
        return view('users.blogs.show', compact('blog')); // Return the blog detail view
    }
}
