<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\VideoBenefit;

class GymVideo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'video_url', 'coach_id', 'is_premium','benefit','video_benefit'];

    // GymVideo belongs to a coach (user)
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    // GymVideo has many benefits (linked by gym_video_id)
    public function benefits(): HasMany
    {
        return $this->hasMany(VideoBenefit::class, 'gym_video_id');
    }
    public function benefit()
{
    return $this->belongsTo(VideoBenefit::class, 'video_benefit_id');
}
public function videoBenefits()
{
    return $this->hasMany(VideoBenefit::class, 'gym_video_id');
}

}
