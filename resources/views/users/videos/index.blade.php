@include('components.layout3')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>
    /* Updated grid layout to be responsive */
    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); /* Auto-resizing columns */
        gap: 1.5rem;
    }

    .video-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 0.75rem;
        overflow: hidden;
    }

    .video-item:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .video-container {
        position: relative;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
        background: #f4f4f4;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 0.5rem;
    }

    /* Tailwind responsiveness - adjusted padding for mobile */
    @media screen and (max-width: 640px) {
        .video-grid {
            grid-template-columns: 1fr; /* Single column on small screens */
            gap: 1rem;
        }

        .video-item {
            padding: 1.5rem; /* Adjust padding for small screens */
        }

        h1 {
            font-size: 2xl; /* Make heading slightly smaller for smaller screens */
        }

        p {
            font-size: 1rem; /* Adjust paragraph font size */
        }
    }

    /* Additional responsiveness for medium and large screens */
    @media screen and (min-width: 640px) {
        h1 {
            font-size: 3xl; /* Larger heading on medium screens */
        }

        .video-item {
            padding: 2rem; /* Adjust padding for medium screens */
        }
    }

</style>

<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-5xl font-extrabold text-center text-gray-800 mb-12">Free Fitness Videos</h1>
        
        <div class="video-grid">
            @foreach($videos as $video)
                @if(!$video->benefits->contains('benefit', 'Premium Video Content'))
                    <div class="video-item bg-white shadow-md rounded-lg p-6">
                        <div class="px-4 mb-4">
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $video->title }}</h1>
                            <p class="text-gray-700 text-lg">{{ Str::limit($video->description, 150) }}</p>
                        </div>
                        <div class="video-container mb-4">
                            <iframe 
                                src="{{ $video->video_url }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @include('components.layout4')
</body>
