<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home()
    {
        return 'toate posturile';
    }

    public function hot()
    {
        return 'best posts';
    }

    public function fresh()
    {
        return 'new posts';
    }

    public function show()
    {
        return 'anumit post';
    }

    public function newpost()
    {
        return 'post nou';
    }

    public function submit()
    {
        return 'submit post';
    }

    public function delete()
    {
        return 'delete post';
    }

    public function report()
    {
        return 'report post';
    }
}
