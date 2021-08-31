<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KelasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (Auth::guard('siswa')->check()) {
            if (in_array($request->user()->kelas->name,$levels)) {
                return $next($request);
            };
        } else if (Auth::guard('guru')->check()){
            if (in_array($request->user(),$levels)) {
                return $next($request);
            };
        }
        return redirect('/login');
    }

}
