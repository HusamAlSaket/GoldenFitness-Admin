@include('components.layout3')

<style>
    body {
        background-color: #f9f9f9;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .custom-blog-container {
        max-width: 800px;
        margin: 40px auto;
        background: #fff;
        border: 1px solid #e6e6e6;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-bottom: 80px; /* Ensures space between content and footer */
    }

    .blog-title {
        color: #d50000;
        font-size: 2.4rem;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .blog-content {
        color: #555;
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .back-link {
        display: inline-block;
        margin-top: 20px;
        color: #d50000;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #d50000;
        padding: 8px 12px;
        border-radius: 4px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .back-link:hover {
        background-color: #d50000;
        color: #fff;
    }

    .blog-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 20px; /* Space between image and content */
    }
</style>

<!-- Custom Content Container -->
<div class="custom-blog-container">
    @if($blog->image_url)
        <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Blog Image" class="blog-image">
    @else
        <img src="https://via.placeholder.com/450x300" alt="Placeholder Image" class="blog-image">
    @endif
    <h1 class="blog-title">{{ $blog->title }}</h1>
    <p class="blog-content">{{ $blog->description }}</p>
    <a href="{{ route('users.blogs.index') }}" class="back-link">Back to Blogs</a>
</div>

@include('components.layout4')
