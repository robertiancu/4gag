<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Admin;
use App\User;

define('RANKUP',1);
define('RANKDOWN',-1);

class AdminController extends Controller
{
    public function reports()
    {
        $reports = Report::with(['user','post'])->get();
        return view('AdminView.reports',compact('reports'));
    }

    public function admins()
    {
        $admins = Admin::with('user')->get();
        return view('AdminView.admins',compact('admins'));
    }

    public function makeadmin(Request $request)
    {
        $admin = new Admin;

        $admin->user_id = $request->user_id;
        $admin->rank=1;

        $admin->save();

        $admins = Admin::with('user')->get();
        return view('AdminView.admins',compact('admins'));
    }

    public function setrank(Request $request, $id)
    {
        $user = User::with('admin')->get()->find($id);

        if($request->setrank == RANKDOWN)
            $user->admin->rankDown();
        else if($request->setrank == RANKUP)
            $user->admin->rankUp();

        $user->admin->save();

        return redirect('/admins');
    }

    public function takeadmin(Request $request)
    {
        $user = User::with('admin')->get()->find($request->id);

        $admin = Admin::find($user->admin->id);

        $admin->delete();

        return redirect('/admins');
    }
}
