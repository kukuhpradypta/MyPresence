<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
{
  //jika akun yang login sesuai dengan role 
  //maka silahkan akses
  //jika tidak sesuai akan diarahkan ke home

  $roleuser = array_slice(func_get_args(), 2);
  foreach ($roleuser as $rolser) { 
      $user = \Auth::user()->rolser;
      if( $user == $rolser){
          return $next($request);
      }
  }

  $rolesiswa = array_slice(func_get_args(), 2);
  foreach ($rolesiswa as $rolsis) { 
      $siswa = \Auth::siswa()->rolsis;
      if( $siswa == $rolsis){
          return $next($request);
      }
  }

  return redirect('/dashboard');
}

}
