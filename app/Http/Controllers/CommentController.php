<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $comment = new \App\Comment;
        $comment->post_id = $id;
        $comment->user_id = \Auth::id();
        $comment->content = $request->comment_text;
        $comment->likes = 0;

        $comment->save();

        return redirect("/post/$id");
    }

    public function delete(Request $request, $id)
    {
        $comment = \App\Comment::find($id);
        $comment->delete();

        return redirect("/post/$request->post_id");
    }
}
