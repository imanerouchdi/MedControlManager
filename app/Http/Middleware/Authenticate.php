<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    //     if (!$request->expectsJson()) {

    //         if(Request::is('./medecin/landing')){
    //             return route('type-users');
    //         }
    //         elseif(Request::is('./assistant/landing')){
    //             return route('type-users');
    //         }
    //         elseif(Request::is('./user/landing')){
    //             return route('type-users');
    //         }
    //         else{
    //             return route('type-users');

    //         }
    //     }
    }

    
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     if ($user->isAdmin()) {
        //         return route('admin.dashboard');
        //     } else if ($user->isUser()) {
        //         return route('user.dashboard');
        //     } else if ($user->isAssistant()) {
        //         return route('assistant.dashboard');
        //     }
        // }

        
    
}
