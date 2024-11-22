@extends('components.layout2') 

    <div class="container">
        <h2>Create New Category</h2>
        
        <form action="{{ route('admins.categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="category_name" class="form-control" value="{{ old('name') }}" required>
            
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>

