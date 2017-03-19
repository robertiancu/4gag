<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\ModelNotFoundException;
use App\Post;
use App\Report;
use App\Category;
use App\Admin;

class PostController extends Controller
{
    public function hot()
    {
        $posts = Post::orderBy('likes','desc')->get();
        return view('PostView.hot',compact('posts'));
    }

    public function fresh()
    {
        $posts = Post::orderBy('created_at','desc')->get();

        return view('PostView.fresh',compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        if($post == NULL)
            throw new ModelNotFoundException;

        $comments = Post::with('comments.user')->find($id);
        $comments = $comments->comments;
        return view('PostView.show',compact('post','comments'));
    }

    public function newpost()
    {
        $categories = Category::all();
        return view('PostView.newpost',compact('categories'));
    }

    public function submit(Request $request)
    {
        $post = new Post;

        $post->user_id = \Auth::id();
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->likes = 0;
        $post->pic_url = $request->url;

        $post->save();

        return redirect("/post/$post->id");
    }

    public function delete(Request $request)
    {
        $post = Post::find($request->id);

        $admin = Admin::where('user_id','=',\Auth::id())->get();

        if(\Auth::id()!= $post->user_id && $admin->isEmpty())
            abort(500);

        $post->delete();

        return redirect('/');
    }

    public function report(Request $request)
    {
        $report = new Report;

        $report->post_id = $request->post_id;
        $report->reason = $request->reason;
        $report->user_id = \Auth::id();

        $report->save();

        return redirect("/post/$request->post_id");
    }
}
