@extends('components.layout2')

    <div class="container mt-4">
        <h2>Add New Video</h2>
        <form action="{{ route('admins.videos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="video_url" class="form-label">Video URL</label>
                <input type="url" class="form-control" id="video_url" name="video_url" value="{{ old('video_url') }}" required>
            </div>
            <button type="submit" class="btn btn-danger">Add Video</button>
            <a href="{{ route('videos.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

