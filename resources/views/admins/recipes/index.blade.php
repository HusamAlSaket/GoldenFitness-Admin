@extends('components.layout2')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- Recipe Stats Grid -->
    <div class="recipe-stats-grid mb-4">
        <div class="stat-card">
            <i class="bi bi-box"></i>
            <div>
                <h5 class="mb-0">{{ $recipes->count() }}</h5>
                <small class="text-muted">Total Recipes</small>
            </div>
        </div>
    </div>

    <!-- Recipes Table Container -->
    <div class="recipes-table-container">
        <div class="recipes-header d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-danger">Recipe List</h4>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-2" placeholder="Search recipes..." style="width: 200px;">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addRecipeModal">
                    <i class="bi bi-plus me-1"></i>Add Recipe
                </button>
            </div>
        </div>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    {{-- <th>Description</th> --}}
                    <th>Category</th>
                    <th>Ingredients</th>
                    <th>Calories</th>
                    <th>Preparation Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recipes as $recipe)
                    <tr id="recipe-{{ $recipe->id }}">


                        <td>
                            @if ($recipe->image_url)
                                <img src="{{ asset('storage/' . $recipe->image_url) }}" alt="Blog Image"
                                    class="img-fluid" style="max-height: 100px;">
                            @else
                                No Image
                            @endif
                        </td>

                        <td>{{ $recipe->recipe_name }}</td>
                        {{-- <td>{{ $recipe->recipe_description}}</td> --}}


                        <td>{{ $recipe->category->category_name ?? 'Uncategorized' }}</td>
                        <td>{{ $recipe->ingredients }}</td>
                        <td>{{ $recipe->calories }}</td>
                        <td>{{ $recipe->preparation_time }} mins</td>
                        <td>
                            <div class="action-buttons text-center">
                                {{-- <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-sm btn-outline-info"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="View Recipe">
                                    <i class="bi bi-eye"></i>
                                </a> --}}
                                <button class="btn btn-sm btn-danger " data-bs-toggle="modal"
                                    data-bs-target="#editRecipeModal-{{ $recipe->id }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Edit Recipe" style="background-color:#00bcd4;" >
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST"
                                    id="delete-form-{{ $recipe->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="confirmDelete({{ $recipe->id }})" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete Recipe">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    
                                </form>
                            </div>
                        </td>


                    </tr>

                    <!-- Edit Recipe Modal -->
                    <div class="modal fade" id="editRecipeModal-{{ $recipe->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Recipe</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Recipe Name -->
                                        <div class="mb-3">
                                            <label class="form-label">Recipe Name</label>
                                            <input type="text" name="recipe_name" class="form-control"
                                                value="{{ old('recipe_name', $recipe->recipe_name) }}" required>
                                        </div>

                                        <!-- Description -->
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" rows="3">{{ old('description', $recipe->description) }}</textarea>
                                        </div>

                                        <!-- Category -->
                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <select name="category_id" class="form-select" required>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == old('category_id', $recipe->category_id) ? 'selected' : '' }}>
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Ingredients -->
                                        <div class="mb-3">
                                            <label class="form-label">Ingredients</label>
                                            <textarea name="ingredients" class="form-control" rows="3">{{ old('ingredients', $recipe->ingredients) }}</textarea>
                                        </div>

                                        <!-- Calories -->
                                        <div class="mb-3">
                                            <label class="form-label">Calories</label>
                                            <input type="number" name="calories" class="form-control"
                                                value="{{ old('calories', $recipe->calories) }}">
                                        </div>

                                        <!-- Preparation Time -->
                                        <div class="mb-3">
                                            <label class="form-label">Preparation Time (mins)</label>
                                            <input type="number" name="preparation_time" class="form-control"
                                                value="{{ old('preparation_time', $recipe->preparation_time) }}">
                                        </div>

                                        <!-- Stock -->
                                        <div class="mb-3">
                                            <label class="form-label">Stock Quantity</label>
                                            <input type="number" name="stock" class="form-control"
                                                value="{{ old('stock', $recipe->stock) }}" required>
                                        </div>

                                        <!-- Upload New Image -->
                                        @if ($recipe->image_url)
                                            <div class="mb-3">
                                                <img src="{{ asset('storage/' . $recipe->image_url) }}"
                                                    alt="Blog Image" class="img-fluid" style="max-height: 200px;">
                                            </div>
                                        @endif

                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-danger">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<!-- Add Recipe Modal -->
<div class="modal fade" id="addRecipeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Recipe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Recipe Name</label>
                        <input type="text" name="recipe_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ingredients</label>
                        <textarea name="ingredients" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calories</label>
                        <input type="number" name="calories" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preparation Time (mins)</label>
                        <input type="number" name="preparation_time" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock Quantity</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image_url" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-danger">Add Recipe</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Deleting Recipes -->
<script>
    function confirmDelete(recipeId) {
        if (confirm('Are you sure you want to delete this recipe?')) {
            document.getElementById(`delete-form-${recipeId}`).submit();
        }
    }
</script>
