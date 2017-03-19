<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Admin;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $comment = new Comment;
        $comment->post_id = $id;
        $comment->user_id = \Auth::id();
        $comment->content = $request->comment_text;
        $comment->likes = 0;

        $comment->save();

        return redirect("/post/$id");
    }

    public function delete(Request $request, $id)
    {
        $comment = Comment::find($id);

        $admin = Admin::where('user_id','=',\Auth::id())->get();

        if($admin->isEmpty())
            abort(500);

        $comment->delete();

        return redirect("/post/$request->post_id");
    }
}
