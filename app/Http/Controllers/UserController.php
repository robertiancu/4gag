<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user($id)
    {
        $user = \App\User::find($id);

        $haveAdmin=true;
        if(\App\User::has('admin')->find($id)==NULL)
            $haveAdmin=false;

        return view('UserView.userinfo',compact('user','haveAdmin'));
    }

    public function home()
    {
        return "nothing";
    }
}
