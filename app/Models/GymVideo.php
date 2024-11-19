<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymVideo extends Model
{
    use HasFactory;

    // GymVideo belongs to a coach (user)
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
