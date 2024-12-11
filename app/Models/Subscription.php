<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'subscription_type', 'start_date', 'end_date', 'status', 'price', 'benefits', 'video_benefit'];

    // Automatically convert to Carbon instances for start_date and end_date
    protected $casts = [ 'start_date' => 'datetime', 'end_date' => 'datetime', ];

    // Subscription belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
