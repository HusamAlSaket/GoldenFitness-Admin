<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name','description','image_url' ];

    
    use HasFactory;

    // Category has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
