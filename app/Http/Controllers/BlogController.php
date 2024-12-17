<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs =Blog::latest()->get();
        return view('admins.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:225',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);
    
        // If an image is uploaded, store it
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public'); // Store image in 'blog_images' folder in the public disk
        }
    
        // Create a new blog with the validated data
        Blog::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_url' => $imagePath, // Save image path to database
        ]);
    
        return redirect()->route('blogs.index')->with('success', 'Blog Created Successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);  // Find the blog by ID
        return view('blogs.show', compact('blog'));  // Return the view with the blog data
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);
    
        $blog = Blog::findOrFail($id);
    
        // If an image is uploaded, store it
        $imagePath = $blog->image_url; // Keep the current image if no new image is uploaded
        if ($request->hasFile('image')) {
            // If there's a new image, delete the old one (if needed)
            if ($imagePath) {
                unlink(public_path('storage/' . $imagePath)); // Remove the old image from the public storage
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }
    
        // Update the blog with the validated data
        $blog->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_url' => $imagePath, // Save the image path to the database
        ]);
    
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
