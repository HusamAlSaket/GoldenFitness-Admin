<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;
    protected $fillable = ['id', 'user_id','message','name','email'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
    
