<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($name)
    {
        $posts = \App\Category::with('posts')->where('category_name',$name)->get();
        $posts = $posts[0]->posts;

        return view('CategoryView.show', compact('posts','name'));
    }
}
