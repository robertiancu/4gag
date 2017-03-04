<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show($name)
    {
        $posts = Category::with('posts')->where('category_name',$name)->get();
        $posts = $posts[0]->posts;

        return view('CategoryView.show', compact('posts','name'));
    }
}
