<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsToMany('App\Post')->wherePivot('likeable', 'post');
    }

    public function comment()
    {
        return $this->belongsToMany('App\Comment')->wherePivot('likeable','comment');
    }
}
