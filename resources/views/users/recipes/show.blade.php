@include('components.layout3')

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
        </div>
    </div>
    <a href="{{route('user.recipes.index')}}" class="btn style2 m-4  ">Back to Recipes</a>
</div>

@include('components.layout4')
