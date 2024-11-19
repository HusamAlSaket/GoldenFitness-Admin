<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    // Coach belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Coach has many gym videos
    public function gymVideos()
    {
        return $this->hasMany(GymVideo::class);
    }
}
