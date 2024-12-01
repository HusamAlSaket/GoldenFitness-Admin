@include('components.layout3')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(700px, 1fr));
        gap: 2rem;
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
</style>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-5xl font-extrabold text-center text-gray-800 mb-12">Premium Fitness Videos</h1>
        
        @if($premiumVideos->isEmpty())
            <p class="text-center text-lg text-gray-600">No premium videos available at the moment.</p>
        @else
            <div class="video-grid">
                @foreach($premiumVideos as $video)
                    <div class="video-item bg-white shadow-lg rounded-lg p-6">
                        <div class="px-4 mb-4">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $video->title }}</h2>
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
                        <div class="text-center">
                            <a href="{{ $video->video_url }}" class="text-blue-500 hover:underline" target="_blank">Watch Video</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    @include('components.layout4')
</body>
