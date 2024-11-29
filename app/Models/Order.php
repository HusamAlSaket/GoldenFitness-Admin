<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Allow mass assignment for user_id
        'total_price',
        'status',
        // Include any other fields you want to mass assign
    ];

    // Order belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Order belongs to a product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items') // Specify the pivot table
            ->withPivot('quantity', 'price') // Include pivot attributes
            ->withTimestamps(); // Include pivot timestamps
    }
    

    // Order belongs to a coupon
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    // Order has many order items (pivot table with products)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
