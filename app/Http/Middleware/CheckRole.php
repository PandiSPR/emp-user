<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $userRoles = Auth::user()->roles->pluck('type');

        if (! $request->user()->hasRole($role)) {
            return redirect('/user');
        }

        return $next($request);
    }

}