<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function reports()
    {
        return 'Reports';
    }

    public function makeadmin($id)
    {
        return 'Make admin '.$id;
    }

    public function setrank($rank,$id)
    {
        return 'Set '. $rank . ' rank ' . $id ;
    }

    public function ban($id)
    {
        return 'Ban ' . $id;
    }
}
