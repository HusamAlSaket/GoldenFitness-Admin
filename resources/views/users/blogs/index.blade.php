@include('components.layout3')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .blog-hero {
            background-color: #dc3545;
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        .blog-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 15px;
        }
        .blog-card {
            width: 100%;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
        .blog-card:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 20px rgba(0,0,0,0.15);
        }
        .blog-card-img {
            height: 300px;
            object-fit: cover;
        }
        .blog-card-body {
            background-color: white;
            padding: 25px;
        }
        .blog-title {
            color: #dc3545;
            font-weight: 700;
        }
        .read-more-btn {
            background-color: #dc3545;
            border: none;
        }
        .read-more-btn:hover {
            background-color: #c82333;
        }
        .blog-footer {
            background-color: #dc3545;
            color: white;
            padding: 20px 0;
        }
    </style>

    <div class="blog-hero">
        <div class="container">
            <h1 class="display-4">Fitness Blogs </h1>
        </div>
    </div>

    <div class="blog-container">
        <div class="row g-4">
            @foreach ($blogs as $blog)
            <div class="col-md-6 col-lg-4">
                <div class="blog-card card">
                    @if($blog->image_url)
                    <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Blog Image" class="img-fluid" style="max-height: 500px;">
                @else
                    <img src="https://via.placeholder.com/450x300" alt="Placeholder Image" class="img-fluid" style="max-height: 500px;">
                @endif
                    <div class="blog-card-body card-body">
                      <h3> {{ $blog->title }}</h3>
                        <p class="card-text text-muted">
                            {{ Str::limit($blog->description, 120, '...') }}
                        </p>
                        <a href="{{ route('users.blogs.show', $blog->id) }}" 
                           class="btn read-more-btn text-white">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('components.layout4')
