<?php

namespace App\Http\Middleware;

use Closure;

class GuestRedirect
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::id();
        if($user == NULL)
            return redirect('/');

        return $next($request);
    }
}
