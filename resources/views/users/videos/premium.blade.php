@include('components.layout3')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>
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

@if (session('sweet_alert'))
    <script>
        Swal.fire({
            icon: 'error', // 'error' indicates it's an error alert
            title: 'Access Denied!',
            text: 'Please subscribe to the yearly plan to get these benefits.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Subscribe Now'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('user.subscriptions.create') }}";
            }
        });
    </script>
@endif

<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-5xl font-extrabold text-center text-gray-800 mb-12">Premium Fitness Videos</h1>
        
        @if ($premiumVideos->isEmpty())
            <p class="text-center text-lg text-gray-600">No premium videos available at the moment.</p>
            <script>
                Swal.fire({
                    icon: 'error', // 'error' indicates it's an error alert
                    title: 'Access Denied!',
                    text: 'Please subscribe to the yearly plan to get these benefits.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Subscribe Now'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('user.subscriptions.create') }}";
                    }
                });
            </script>
        @else
            <!-- Tailwind's grid system for responsiveness -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($premiumVideos as $video)
                    <div class="video-item bg-white shadow-lg rounded-lg p-6">
                        <div class="px-4 mb-4">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $video->title }}</h2>
                            <p class="text-gray-700 text-lg">{{ Str::limit($video->description, 150) }}</p>
                        </div>
                        <div class="video-container mb-4">
                            <iframe src="{{ $video->video_url }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @include('components.layout4')
</body>
