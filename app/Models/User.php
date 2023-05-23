<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot() {
        parent::boot();

        self::created(function ($model) {
            $profile = new Profile();
            $profile->user_id = User::find(Auth::id());
            $profile->url = 'images/avatar.png';
            $model->profile()->save($profile);
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function posts() {

        return $this->hasMany(Post::class, 'user_id');

    }

    public function IFollow(){
        return $this->belongsToMany("App\Models\User", "follow", "follower_id", "followed_id" );
    }

    public function theyFollowMe() {
        return $this->belongsToMany("App\Models\User", "follow", "followed_id", "follower_id" );
    }
}
