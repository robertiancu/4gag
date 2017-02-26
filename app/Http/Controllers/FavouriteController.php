<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function add(Request $request)
    {
        $fav = new \App\Favourite;

        $fav->user_id = \Auth::id();
        $fav->post_id = $request->post_id;

        $fav->save();

        return redirect("/post/$fav->post_id");
    }

    public function index()
    {
        $favs = \App\Favourite::with('post')->where('user_id',\Auth::id())->get();
        return view('UserView.favourites',compact('favs'));
    }

    public function delete($id)
    {
        $fav = \App\Favourite::find($id);
        $fav->delete();
        return redirect("/favourites");
    }
}
