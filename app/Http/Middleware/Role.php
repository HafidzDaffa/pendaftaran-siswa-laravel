<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $roles = [
            'admin' => 'admin',
            'wali_murid' => 'wali_murid',
        ];
        $role = $roles[$role];
        if(!empty(auth()->user()->role))
        {
            if(auth()->user()->role == $role)
            {
                return $next($request);
            }
        }
        else
        {
            return redirect('/login');
        }
        abort(403);
    }
}
