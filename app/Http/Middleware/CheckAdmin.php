<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Admin;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::id();

        if ($user == NULL)
            return redirect('/');

        $admin = Admin::where([['user_id','=',$user]])->first();

        if ($admin == NULL)
            return redirect('/');

        return $next($request);
    }
}
