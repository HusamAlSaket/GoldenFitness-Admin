<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // OrderItem belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // OrderItem belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
    