<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoBenefit extends Model
{
    use HasFactory;

    protected $fillable = ['gym_video_id', 'benefit'];

    // VideoBenefit belongs to a GymVideo
    public function gymVideo()
    {
        return $this->belongsTo(GymVideo::class);
    }
}
