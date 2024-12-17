@include('components.layout3')

<style>
    body {
        background-color: #f2f2f2;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .custom-blog-container {
        max-width: 900px;
        margin: 50px auto;
        background: linear-gradient(135deg, #ffffff, #f7f7f7);
        border-radius: 16px;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin-bottom: 100px;
        transition: all 0.3s ease;
    }

    .custom-blog-container:hover {
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        transform: translateY(-10px);
    }

    .blog-title {
        color: #d50000;
        font-size: 3rem;
        margin-bottom: 25px;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
    }

    .blog-content {
        color: #555;
        font-size: 1.15rem;
        line-height: 1.8;
        margin-bottom: 40px;
        text-align: justify;
        transition: color 0.3s ease;
    }

    .blog-content:hover {
        color: #333;
    }

    .back-link {
        display: inline-block;
        margin-top: 30px;
        color: #fff;
        background-color: #d50000;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #d50000;
        padding: 12px 20px;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        text-align: center;
        font-size: 1.1rem;
    }

    .back-link:hover {
        background-color: #fff;
        color: #d50000;
        transform: scale(1.05);
    }

    .blog-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 16px;
        margin-bottom: 30px;
        transition: transform 0.5s ease, opacity 0.3s ease;
        opacity: 0.9;
    }

    .blog-container {
        position: relative;
        overflow: hidden;
    }

    .blog-container:hover .blog-image {
        transform: scale(1.1);
        opacity: 1;
    }

    /* Adding a subtle shadow effect on images */
    .blog-image {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Custom Content Container -->
<div class="custom-blog-container">
    <div class="blog-container">
        @if($blog->image_url)
            <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Blog Image" class="blog-image">
        @else
            <img src="https://via.placeholder.com/900x450" alt="Placeholder Image" class="blog-image">
        @endif
    </div>
    
    <h1 class="blog-title">{{ $blog->title }}</h1>
    <p class="blog-content">{{ $blog->description }}</p>
    
    <a href="{{ route('users.blogs.index') }}" class="back-link">Back to Blogs</a>
</div>

@include('components.layout4')
