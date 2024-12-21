@include('components.layout3')

<style>
    .netflix-play-btn {
        background: linear-gradient(45deg, #E50914, #B20710);
        color: white;
        padding: 12px 28px;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        font-size: 16px;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(229, 9, 20, 0.3);
    }

    .netflix-play-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            45deg,
            transparent,
            rgba(255, 255, 255, 0.2),
            transparent
        );
        transition: 0.5s;
    }

    .netflix-play-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(229, 9, 20, 0.4);
    }

    .netflix-play-btn:hover::before {
        left: 100%;
    }

    .netflix-play-btn i {
        font-size: 18px;
        transition: transform 0.3s ease;
    }

    .netflix-play-btn:hover i {
        transform: scale(1.2);
    }

    .netflix-play-btn::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
</style>


<div class="container">
    <h1>{{ $recipe->recipe_name }}</h1>
    <div class="row">
        <div class="col-md-6">
            <img 
                src="{{ $recipe->image_url ? asset('storage/' . $recipe->image_url) : 'https://via.placeholder.com/300' }}" 
                class="img-fluid" 
                alt="{{ $recipe->recipe_name }}"
            >
        </div>
        <div class="col-md-6">
            <h4>Category: {{ $recipe->category->name }}</h4>
            <p><strong>Calories:</strong> {{ $recipe->calories ?? 'N/A' }}</p>
            <p><strong>Preparation Time:</strong> {{ $recipe->preparation_time ?? 'N/A' }} minutes</p>
            <p><strong>Ingredients:</strong></p>
            <p>{{ $recipe->ingredients ?? 'N/A' }}</p>

            <!-- Play Video Button -->
            <div class="d-flex justify-content-center mt-4">

            @if($recipe->video_url)
                <button class="netflix-play-btn" data-bs-toggle="modal" data-bs-target="#videoModal">Play Video</button>
            @endif
            </div>
        </div>
    </div>
    
    <a href="{{route('user.recipes.index')}}" class="btn style2 m-4">Back to Recipes</a>
</div>

<!-- Video Modal -->
@if($recipe->video_url)
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">{{ $recipe->recipe_name }} - Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Embed video iframe -->
                    <iframe width="100%" height="400" src="{{ $recipe->video_url }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endif

@include('components.layout4')
