<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function reports()
    {
        $reports = \App\Report::with(['user','post'])->get();
        return view('AdminView.reports',compact('reports'));
    }

    public function admins()
    {
        $admins = \App\Admin::with('user')->get();
        return view('AdminView.admins',compact('admins'));
    }

    public function makeadmin(Request $request)
    {
        $admin = new \App\Admin;

        $admin->user_id = $request->user_id;
        $admin->rank=1;

        $admin->save();

        $admins = \App\Admin::with('user')->get();
        return view('AdminView.admins',compact('admins'));
    }

    public function setrank(Request $request, $id)
    {
        $user = \App\User::with('admin')->get()->find($id);
        if($request->setrank == -1)
            $user->admin->rank-=1;
        else if($request->setrank == 1)
            $user->admin->rank+=1;

        $user->admin->save();

        return redirect('/admins');
    }

    public function takeadmin(Request $request)
    {
        $user = \App\User::with('admin')->get()->find($request->id);

        $admin =\App\Admin::find($user->admin->id);

        $admin->delete();

        return redirect('/admins');
    }
}
