<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function user($id)
    {
        $user = User::find($id);

        $haveAdmin=true;
        if(User::has('admin')->find($id)==NULL)
            $haveAdmin=false;

        return view('UserView.userinfo',compact('user','haveAdmin'));
    }

    public function home(Request $request)
    {
        return $request;
    }
}
