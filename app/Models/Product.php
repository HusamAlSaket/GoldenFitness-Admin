<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id'];


    // Product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product has many orders (many-to-many)
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items') // Specify the pivot table
            ->withPivot('quantity', 'price') // Include pivot attributes
            ->withTimestamps(); // Include pivot timestamps
    }
    

    // Product has many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Product has many images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Product can be in many wishlists
    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'wishlist');
    }
}
