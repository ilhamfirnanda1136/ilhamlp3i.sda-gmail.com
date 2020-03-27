<?php

namespace App\Http\Middleware;

use Closure;

class level
{

    public function handle($request, Closure $next,...$level)
    {
       if(in_array($request->user()->level,$level))
        {
            return $next($request);
        }
       return  redirect('/');
    }
}