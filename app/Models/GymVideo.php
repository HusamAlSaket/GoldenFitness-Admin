<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\VideoBenefit;



class GymVideo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','video_url','coach_id'];

    // GymVideo belongs to a coach (user)
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
    public function benefits(){
        return $this->hasMany(VideoBenefit::class);
    }
}
