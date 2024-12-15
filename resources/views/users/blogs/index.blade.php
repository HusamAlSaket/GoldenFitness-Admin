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
<section class="blog-area space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <!-- Blog List -->
            <div class="col-xxl-8 col-lg-7">
                <div id="blog-list">
                    @foreach ($initialBlogs as $blog)
                        <div class="blog-card style4 mb-4">
                            <div class="blog-img">
                                @if ($blog->image_url)
                                    <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}"
                                        class="img-fluid fixed-image">
                                @else
                                    <img src="https://via.placeholder.com/450x300" alt="Placeholder Image"
                                        class="img-fluid fixed-image">
                                @endif
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="#"><i class="far fa-clock"></i>{{ $blog->created_at->format('d M, Y') }}</a>
                                    <a href="#"><i class="far fa-user"></i>Post by: Admin</a>
                                </div>
                                <h3 class="blog-title">{{ $blog->title }}</h3>
                                <p>{{ Str::limit($blog->description, 120, '...') }}</p>
                                <a href="{{ route('users.blogs.show', $blog->id) }}" class="link-btn style2">
                                    <i class="fas fa-arrow-right"></i> READ MORE
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-4">
                    <button id="load-more" class="btn style2">Load More</button>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    let offset = 3; // Start after the initial 3 blogs
                    const loadMoreButton = document.getElementById('load-more');
                    const blogList = document.getElementById('blog-list');

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
                            <div class="blog-card style4 mb-4">
                                <div class="blog-img">
                                    <img src="${blog.image_url ? `{{ asset('storage/') }}/${blog.image_url}` : 'https://via.placeholder.com/450x300'}" alt="${blog.title}" class="img-fluid fixed-image">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="#"><i class="far fa-clock"></i>${new Date(blog.created_at).toLocaleDateString()}</a>
                                        <a href="#"><i class="far fa-user"></i>Post by: Admin</a>
                                    </div>
                                    <h3 class="blog-title">${blog.title}</h3>
                                    <p>${blog.description.slice(0, 120)}...</p>
                                    <a href="/blogs/${blog.id}" class="link-btn style2">
                                        <i class="fas fa-arrow-right"></i> READ MORE
                                    </a>
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

            <!-- Sidebar -->
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <!-- Recent Blogs Widget -->
                    <div class="widget mt-4">
                        <h3 class="widget_title">Recent Blogs</h3>
                        <div class="recent-post-wrap">
                            @foreach ($latestBlogs as $latest)
                                <div class="recent-post mb-3">
                                    <div class="media-img">
                                        <a href="{{ route('users.blogs.show', $latest->id) }}">
                                            <img src="{{ asset('storage/' . $latest->image_url) }}"
                                                alt="{{ $latest->title }}" class="img-fluid fixed-image">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title">
                                            <a href="{{ route('users.blogs.show', $latest->id) }}" class="text-danger">{{ $latest->title }}</a>
                                        </h4>
                                        <div class="recent-post-meta">
                                            <a href="#" class="date-link text-danger">{{ $latest->created_at->format('d M, Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
            
        </div>
    </div>
</section>
<style>
    .recent-post-meta a.date-link {
    color: #ff0000; /* Red color */
    font-weight: bold;
    transition: color 0.3s ease;
}

.recent-post-meta a.date-link:hover {
    color: #cc0000; /* Darker red color on hover */
}

</style>
<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>

@include('components.layout4')

<style>
    .blog-card {
        position: relative;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: 1px solid transparent;
        transition: all 0.3s ease-in-out;
    }

    .blog-card:hover {
        transform: scale(1.03);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        border-color: rgba(255, 0, 0, 0.3);
    }

    .blog-img {
        position: relative;
        overflow: hidden;
    }

    .blog-img img.fixed-image {
        width: 100%;
        height: 650px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .blog-img:hover img.fixed-image {
        transform: scale(1.1);
    }

    .recent-post {
        background-color: #fff;
        border: 1px solid #ff0000;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    .recent-post:hover {
        transform: scale(1.05);
        border-color: #ff4c4c;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .recent-post .media-img img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .recent-post:hover .media-img img {
        transform: scale(1.1);
    }

    .blog-meta a,
    .recent-post-meta a {
        color: #ff0000;
        font-weight: bold;
    }

    .blog-title,
    .post-title {
        color: #333;
    }

    .link-btn {
        color: #ff0000;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .link-btn:hover {
        color: #ff4c4c;
    }
</style>
