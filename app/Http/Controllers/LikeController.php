<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\Like;

class LikeController extends Controller
{
    public function likecomment(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->likes+=1;

        $comment->update();

        $like = new Like;
        $like->user_id = \Auth::id();
        $like->likeable_id = $id;
        $like->likeable = 'comment';

        $like->save();

        return redirect("/post/$request->post_id");
    }

    public function likepost($id)
    {
        $post = Post::find($id);
        $post->likes+=1;

        $post->update();

        $like = new Like;
        $like->user_id = \Auth::id();
        $like->likeable_id = $id;
        $like->likeable = 'post';

        $like->save();

        return redirect("/post/$id");
    }
}
