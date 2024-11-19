<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // User has many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // User has many subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // User has many goals
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    // User has many macro tracking records
    public function macroTracking()
    {
        return $this->hasMany(MacroTracking::class);
    }

    // User has many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // User has many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // User has many wishlists
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // User can have one coach profile (if a coach)
    public function coachProfile()
    {
        return $this->hasOne(Coach::class);
    }
}
