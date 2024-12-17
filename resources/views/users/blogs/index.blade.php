@include('components.layout3')

<!--==============================
    Breadcumb
==============================-->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/hero/hero_bg_2_2.png') }}"
    style="width: 100%; height:700px; display: flex; align-items: center; justify-content: center; 
            background-image: url('{{ asset('assets/img/hero/hero_bg_2_2.png') }}'); 
            background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-content text-center">
                    <h1 class="breadcumb-title">Our Blogs</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
    Blog Area
==============================-->
<section class="blog-area space bg-smoke3">
    <div class="container">
        <div class="title-area text-center">
          
            <h2 class="sec-title text-danger">Read Our Latest Articles</h2>
        </div>
        <div class="row global-carousel blog-slider" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2"
            data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false" data-md-dots="true">
            @foreach ($initialBlogs as $blog)
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            @if ($blog->image_url)
                                <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}">
                            @else
                                <img src="https://via.placeholder.com/450x300" alt="Placeholder Image">
                            @endif
                        </div>
                        <div class="blog-content" data-bg-src="{{ asset('assets/img/blog/blog_card1_bg.png') }}">
                            <div class="blog-meta">
                                <a href="#"><i
                                        class="fal fa-calendar"></i>{{ $blog->created_at->format('d M Y') }}</a>
                                <a href="#"><i class="far fa-user"></i>by Admin</a>
                            </div>
                            <h3 class="blog-title box-title">
                                <a href="{{ route('users.blogs.show', $blog->id) }}">{{ $blog->title }}</a>
                            </h3>
                            <p class="blog-text">{{ Str::limit($blog->description, 120, '...') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-4">
            <button id="load-more" class="btn style2">Load More</button>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let offset = 3; // Start after the initial 3 blogs
        const loadMoreButton = document.getElementById('load-more');
        const blogList = document.querySelector('.global-carousel.blog-slider');

        loadMoreButton.addEventListener('click', () => {
            fetch(`{{ route('users.blogs.index') }}?offset=${offset}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(blogs => {
                    if (blogs.length > 0) {
                        blogs.forEach(blog => {
                            const blogCard = `
    <div class="col-md-6 col-lg-4">
        <div class="blog-card">
            <div class="blog-img">
                <img src="${blog.image_url ? `{{ asset('storage/') }}/${blog.image_url}` : 'https://via.placeholder.com/450x300'}" alt="${blog.title}">
            </div>
            <div class="blog-content" data-bg-src="{{ asset('assets/img/blog/blog_card1_bg.png') }}">
                <div class="blog-meta">
                    <a href="#"><i class="fal fa-calendar"></i>${new Date(blog.created_at).toLocaleDateString()}</a>
                    <a href="#"><i class="far fa-user"></i>by Admin</a>
                </div>
                <h3 class="blog-title box-title">
                    <a href="/blogs/${blog.id}">${blog.title}</a>
                </h3>
                <p class="blog-text">${blog.description.slice(0, 120)}...</p>
            </div>
        </div>
    </div>
`;

                            blogList.insertAdjacentHTML('beforeend', blogCard);
                        });
                        offset += blogs.length; // Update offset
                    } else {
                        loadMoreButton.textContent = 'No More Blogs';
                        loadMoreButton.disabled = true;
                    }
                })
                .catch(error => console.error('Error loading more blogs:', error));
        });
    });
</script>

@include('components.layout4')

<style>
    .blog-area {
        background-color: #f4f4f4;
        padding: 100px 0;
    }

    .title-area {
        margin-bottom: 50px;
    }

    .sub-title {
        display: block;
        color: #ff0000;
        margin-bottom: 10px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .sec-title {
        font-size: 36px;
        color: #333;
        font-weight: 700;
    }

    .blog-card {
        background-color: #333;
        /* Black background for consistency */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        margin-bottom: 30px;
        height: 600px;
        /* Fixed height for uniformity */
        display: flex;
        flex-direction: column;
    }

    .blog-card:hover {
        transform: translateY(-10px);
    }

    .blog-img img {
        width: 100%;
        height: 400px;
        /* Fixed image height for consistency */
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .blog-card:hover .blog-img img {
        transform: scale(1.05);
    }

    .blog-content {
        padding: 25px;
        background-size: cover;
        background-position: center;
        color: white;
        /* Ensure text is visible on dark background */
        flex-grow: 1;
        /* Allow the content to expand and fill available space */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .blog-meta {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        color: #bbb;
        /* Lighter gray for the meta data */
    }

    .blog-meta a {
        color: #ff0000;
        /* Red color for meta links */
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .blog-meta a i {
        margin-right: 5px;
    }

    .blog-title {
        margin-bottom: 15px;
        font-size: 18px;
        /* Consistent title size */
    }

    .blog-title a {
        color: white;
        /* White color for the title */
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog-title a:hover {
        color: #ff0000;
        /* Red color on hover */
    }

    .blog-text {
        color: #bbb;
        /* Light gray for text */
        margin-bottom: 20px;
    }

    .btn.style2 {
        background-color: #ff0000;
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        transition: background-color 0.3s ease;
    }

    .btn.style2:hover {
        background-color: #cc0000;
    }
</style>
