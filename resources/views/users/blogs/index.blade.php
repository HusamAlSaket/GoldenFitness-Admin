@include('components.layout3')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!--==============================
    Breadcumb
==============================-->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Our Blogs</h1>
                    <ul class="breadcumb-menu">
                        <li class="active">BLOG PAGE</li>
                    </ul>
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
            <!-- Blog List -->
            <div class="col-xxl-8 col-lg-7">
                <div id="blog-list">
                    @foreach ($initialBlogs as $blog)
                        <div class="blog-card style4 mb-4">
                            <div class="blog-img">
                                @if ($blog->image_url)
                                    <img src="{{ asset('storage/' . $blog->image_url) }}" alt="{{ $blog->title }}"
                                        class="img-fluid" style="max-height: 500px;">
                                @else
                                    <img src="https://via.placeholder.com/450x300" alt="Placeholder Image"
                                        class="img-fluid" style="max-height: 500px;">
                                @endif
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="#"><i
                                            class="far fa-clock"></i>{{ $blog->created_at->format('d M, Y') }}</a>
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
                    let offset = 3; // Start after the initial 2 blogs
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
                                    <img src="${blog.image_url ? `{{ asset('storage/') }}/${blog.image_url}` : 'https://via.placeholder.com/450x300'}" alt="${blog.title}" class="img-fluid" style="max-height: 500px;">
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
                    <!-- Search Widget -->

                    <!-- Recent Blogs Widget -->
                    <div class="widget mt-4">
                        <h3 class="widget_title">Recent Blogs</h3>
                        <div class="recent-post-wrap">
                            @foreach ($latestBlogs as $latest)
                                <div class="recent-post mb-3">
                                    <div class="media-img">
                                        <a href="{{ route('users.blogs.show', $latest->id) }}">
                                            <img src="{{ asset('storage/' . $latest->image_url) }}"
                                                alt="{{ $latest->title }}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title">
                                            <a
                                                href="{{ route('users.blogs.show', $latest->id) }}">{{ $latest->title }}</a>
                                        </h4>
                                        <div class="recent-post-meta">
                                            <a href="#">{{ $latest->created_at->format('d M, Y') }}</a>
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

<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>

@include('components.layout4')
