<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
      if(!Auth::check())
      {
        return redicrect('/');
      }
      $user = Auth::user();
      if($user->level == $role)
      {
        return $next($request);
      }
      else
      {
        return redirect('/')->with('status', "Silahkan Login Terlebih Dahulu");
      }
    }
}
