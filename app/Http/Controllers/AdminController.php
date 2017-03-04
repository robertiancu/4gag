<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Admin;
use App\User;

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
        if($request->setrank == -1)
            $user->admin->rank-=1;
        else if($request->setrank == 1)
            $user->admin->rank+=1;

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
