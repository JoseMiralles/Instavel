<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Each user has their own profile.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Each user has multiple posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', "DESC");
    }

    /**
     * Runs when the user is created.
     * Can be used to create and populate non-nullable data of children.
     */
    protected static function boot()
    {
        parent::boot();

        // Create and populate the profile.
        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->username
            ]);
        });
    }

}
