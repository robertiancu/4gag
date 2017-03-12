<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\DoubleLikeException;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function checkCommentForDoubleLike($user,$comment)
    {
        $liked = Like::where([
            ['user_id','=',$user],
            ['likeable_id','=',$comment],
            ['likeable','=','comment'],
        ])->get();

        if($liked->count() > 0)
            throw new DoubleLikeException;
    }
}
