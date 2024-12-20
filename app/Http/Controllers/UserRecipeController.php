<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class UserRecipeController extends Controller
{
    public function index()
    {
        // Fetch recipes with their associated category
        $recipes = Recipe::with('category')->get();

        // Pass the data to the view
        return view('users.recipes.index', compact('recipes'));
    }
    public function show($id)
    {
        $recipe = Recipe::with('category')->findOrFail($id); // Fetch the recipe with the category
        return view('users.recipes.show', compact('recipe')); // Pass the recipe to the show view
    }
    
}
