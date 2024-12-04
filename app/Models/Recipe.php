<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_name',
        'ingredients',
        'calories',
        'preparation_time',
        'category_id',
        'image_url',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
