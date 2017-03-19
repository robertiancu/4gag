<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\ModelNotFoundException;
use App\Category;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    public function show($name)
    {
        $category = Category::where('category_name','=',$name)->first();

        if($category == NULL)
            throw new ModelNotFoundException;

        $posts = Category::with('posts')->where('category_name',$name)->get();
        $posts = $posts[0]->posts;

        return view('CategoryView.show', compact('posts','name'));
    }
}
