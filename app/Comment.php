<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likeUp($user,$comment)
    {
        $liked = new Like;
        $liked->checkCommentForDoubleLike($user,$comment);

        $this->likes += 1;


        $like = new Like;
        $like->user_id = $user;
        $like->likeable_id = $comment;
        $like->likeable = 'comment';
        $like->save();
    }
}
