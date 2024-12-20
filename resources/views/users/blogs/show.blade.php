@include('components.layout3')

<!-- Blog Detail Page -->
<div class="blog-detail-wrapper mt-4">
    <div class="blog-card">
        <div class="featured-image">
            @if($blog->image_url)
                <img src="{{ asset('storage/' . $blog->image_url) }}" alt="Blog Image">
            @else
                <img src="https://via.placeholder.com/800x400" alt="Placeholder Image">
            @endif
        </div>
        
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

        <div class="blog-footer">
            <a href="{{ route('users.blogs.index') }}" class="back-button">
                <span class="back-icon"><i class="fas fa-arrow-left"></i></span>
                <span>Back to Articles</span>
            </a>
        </div>
    </div>
</div>

@include('components.layout4')

<style>
.blog-detail-wrapper {
    background-color: #ffffff;
    min-height: 100vh;
    padding-bottom: 2rem;
}

.blog-card {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.featured-image {
    width: 100%;
    height: 300px; /* Set a fixed height for the image */
    overflow: hidden;
}

.featured-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;  /* Adjusted to contain */
}

.content-container {
    padding: 2rem;
}

.main-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.meta-info {
    display: flex;
    gap: 2rem;
    font-size: 1rem;
    color: #555;
}

.meta-info span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.meta-info i {
    color: #ff0000;
}

.main-content p {
    font-size: 1.25rem; /* Increase font size for description */
    line-height: 1.8;
    color: #333;
    margin-bottom: 1.5rem; /* Add some space below the description */
}

.article-body {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #333;
}

.blog-footer {
    margin-top: 2rem;
    padding-top: 1rem;
    border-top: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.back-button {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: #333;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.back-button:hover {
    color: #ff0000;
}

.back-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease;
}

.back-button:hover .back-icon {
    background-color: #ff0000;
    color: white;
}

@media (max-width: 991px) {
    .main-title {
        font-size: 2.5rem;
    }

    .blog-footer {
        flex-direction: column;
        gap: 2rem;
    }
}

@media (max-width: 767px) {
    .featured-image {
        height: 250px;
    }

    .main-title {
        font-size: 1.75rem;
    }

    .meta-info {
        flex-direction: column;
        gap: 1rem;
    }

    .blog-footer {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>
