<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoBenefit extends Model
{
    use HasFactory;

    protected $fillable = ['gym_video_id', 'benefit','is_premium','video_benefit'];

    // VideoBenefit belongs to a GymVideo
    public function gymVideo()
    {
        return $this->belongsTo(GymVideo::class);
    }
    public function videos()
    {
        return $this->hasMany(GymVideo::class, 'video_benefit_id');
    }
}
