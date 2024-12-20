@include('components.layout3')

<div class="container">
    <h1>Recipes</h1>
    <div class="row">
        @foreach($recipes as $recipe)
        <div class="col-md-4">
            <div class="card d-flex flex-column" style="height: 100%; min-height: 350px;"> <!-- Ensures all cards have the same height -->
                <img 
                    src="{{ $recipe->image_url ? asset('storage/' . $recipe->image_url) : 'https://via.placeholder.com/150' }}" 
                    class="card-img-top" 
                    alt="{{ $recipe->recipe_name }}"
                >
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $recipe->recipe_name }}</h5>
                    <p class="card-text">Category: {{ $recipe->category->category_name }}</p>
                    <p class="card-text">Calories: {{ $recipe->calories ?? 'N/A' }}</p>
                    <p class="card-text">Preparation Time: {{ $recipe->preparation_time ?? 'N/A' }} minutes</p>
                    <a href="{{ route('users.recipes.show', $recipe->id) }}" class="btn style2 mt-auto ">View Recipe</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('components.layout4')
<style>
    .card {
    height: 100%;
    min-height: 350px;
}

.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

</style>