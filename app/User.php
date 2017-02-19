<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function favourites()
    {
        return $this->hasMany('App\Favourite');
    }

    public function like()
    {
        return $this->hasMany('App\Like');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
