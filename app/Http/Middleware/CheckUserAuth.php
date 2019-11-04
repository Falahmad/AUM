<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Session;

class CheckUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $userName = Session::get('userName')[0];
        if(!$userName) {
            return redirect()->route('/');
        }
        return $next($request);
    }
}
