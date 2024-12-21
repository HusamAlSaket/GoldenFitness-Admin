@include('components.layout3')

<!-- Blog Detail Page -->
<div class="blog-detail-wrapper mt-4">
    <div class="blog-card">
        <!-- Featured Image -->
        <div class="featured-image">
            @if($blog->image_url)
                <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Blog Image">
            @else
                <img src="https://via.placeholder.com/800x400" alt="Placeholder Image">
            @endif
        </div>

        <!-- Content Section -->
        <div class="content-container">
            <h1 class="main-title">{{ $blog->title }}</h1>
            <div class="meta-info">
                <span><i class="far fa-calendar"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                <span><i class="far fa-clock"></i> {{ $blog->reading_time ?? '5 min read' }}</span>
                <span><i class="far fa-user"></i> by {{ $blog->author_name ?? 'Admin' }}</span>
            </div>

            <article class="main-content">
                <p>{{ $blog->description }}</p>
                <div class="article-body">
                    {!! $blog->content !!}
                </div>
            </article>
        </div>

        <!-- Blog Footer -->
        <div class="blog-footer">
            <a href="{{ route('users.blogs.index') }}" class="back-button mt-3 mb-4">
                <span class="back-icon"><i class="fas fa-arrow-left"></i></span>
                <span>Back to Articles</span>
            </a>
        </div>
    </div>
</div>

@include('components.layout4')

<!-- Updated Styles -->
<style>
/* General Wrapper */
.blog-detail-wrapper {
    background-color: #f9f9f9;
    min-height: 100vh;
    padding: 2rem 1rem;
}

/* Blog Card */
.blog-card {
    max-width: 900px;
    margin: 0 auto;
    background-color: #ffffff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.blog-card:hover {
    transform: translateY(-5px);
}

/* Featured Image */
.featured-image {
    width: 100%;
    height: auto;
    overflow: hidden;
}

.featured-image img {
    width: 100%;
    height: auto;
    object-fit: cover; /* Changed to cover for better scaling */
    border-bottom: 3px solid #ff4b5c; /* Accent line below image */
}

/* Content Container */
.content-container {
    padding: 2rem;
    font-family: 'Roboto', sans-serif;
}

/* Title */
.main-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: red;
    text-align: center;
    margin-bottom: 1rem;
}

/* Meta Info */
.meta-info {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    font-size: 1rem;
    color:red;
    margin-bottom: 1.5rem;
}

.meta-info span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.meta-info i {
    color: #ff4b5c;
}

/* Main Content */
.main-content p {
    font-size: 1.25rem;
    line-height: 1.8;
    color: white;
    margin-bottom: 1.5rem;
}

.article-body {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #555;
}

/* Blog Footer */
.blog-footer {
    margin-top: 2rem;
    padding-top: 1rem;
    border-top: 1px solid #eee;
    text-align: center;
}

.back-button {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    color: #ff4b5c;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease, transform 0.3s ease;
}

.back-button:hover {
    color: #ff1b2d;
    transform: translateX(-3px);
}

.back-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #ffe6e9;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease;
}

.back-button:hover .back-icon {
    background-color: #ff4b5c;
    color: white;
}

/* Media Queries */
@media (max-width: 991px) {
    .main-title {
        font-size: 2rem;
    }

    .meta-info {
        flex-direction: column;
        gap: 0.5rem;
        text-align: center;
    }
}

@media (max-width: 767px) {
    .main-title {
        font-size: 1.75rem;
    }

    .content-container {
        padding: 1.5rem;
    }

    .meta-info {
        font-size: 0.9rem;
    }

    .back-button {
        font-size: 0.9rem;
    }
}
</style>
@include('components.layout3')
