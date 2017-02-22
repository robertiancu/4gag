<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function hot()
    {
        $posts = \App\Post::orderBy('likes','desc')->get();
        return view('PostView.hot',compact('posts'));
    }

    public function fresh()
    {
        $posts = \App\Post::orderBy('created_at','desc')->get();

        return view('PostView.fresh',compact('posts'));
    }

    public function show($id)
    {
        $post = \App\Post::find($id);
        return view('PostView.show',compact('post'));
    }

    public function newpost()
    {
        $categories = \App\Category::all();
        return view('PostView.newpost',compact('categories'));
    }

    public function submit(Request $request)
    {
        $post = new \App\Post;

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
        $post = \App\Post::find($request->id);

        $post->delete();

        return redirect('/');
    }

    public function report(Request $request)
    {
        $report = new \App\Report;

        $report->post_id = $request->post_id;
        $report->reason = $request->reason;
        $report->user_id = \Auth::id();

        $report->save();

        return redirect("/post/$request->post_id");
    }
}
