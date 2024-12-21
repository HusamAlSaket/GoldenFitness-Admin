<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('category')->get();
        $categories = Category::all();
        return view('admins.recipes.index', compact('recipes', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipe_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'ingredients' => 'nullable|string',
            'calories' => 'nullable|numeric',
            'preparation_time' => 'nullable|numeric',
            'stock' => 'required|integer',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'video_url' => 'nullable|url|max:255', // Validate video URL
        ]);

        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('recipes', 'public');
        }

        Recipe::create([
            'recipe_name' => $request->recipe_name,
            'category_id' => $request->category_id,
            'ingredients' => $request->ingredients,
            'calories' => $request->calories,
            'preparation_time' => $request->preparation_time,
            'stock' => $request->stock,
            'image_url' => $imagePath,
            'video_url' => $request->video_url, // Save video URL
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe added successfully.');
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'recipe_name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'calories' => 'nullable|integer',
            'preparation_time' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_url' => 'nullable|url|max:255', // Validate video URL
        ]);

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('recipes', 'public');
            $recipe->image_url = $imagePath;
        }

        $recipe->update([
            'recipe_name' => $request->recipe_name,
            'ingredients' => $request->ingredients,
            'calories' => $request->calories,
            'preparation_time' => $request->preparation_time,
            'category_id' => $request->category_id,
            'video_url' => $request->video_url, // Update video URL
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Product deleted successfully!');
    }
}
