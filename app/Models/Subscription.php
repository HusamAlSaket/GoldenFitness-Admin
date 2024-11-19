<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Subscription belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
