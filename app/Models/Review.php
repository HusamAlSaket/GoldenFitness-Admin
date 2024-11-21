<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'rating',
        'comment',
        'status',
    ];

    // Review belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Review belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
