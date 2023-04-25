<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

            foreach($guards as $guard){
                if(Auth::guard($guard)->check()){

                    $user = Auth::user();
                    
                    if(!empty($user->getRoleNames())){
                        $roles = $user->getRoleNames()->toArray();

                        if(in_array('Admin', $roles) || in_array('Assistant', $roles)){
                            return redirect(RouteServiceProvider::HOME);
                        }
                    }
                return redirect(RouteServiceProvider::INDEX);

                }
            }
        

        return $next($request);
    }
}
