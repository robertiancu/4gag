<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exceptions\ModelNotFoundException;

class UserController extends Controller
{
    public function user($id)
    {
        $user = User::find($id);
        if($user == NULL)
            throw new ModelNotFoundException;

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
