<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

        if($request->type == 'medecin'){
            $guardName= 'medecin';
        }
        elseif ($request->type == 'assistant'){
            $guardName= 'assistant';
        }
        else{
            $guardName= 'web';
        }
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'medecin'){
            return redirect()->intended(RouteServiceProvider::MEDECIN);
        }
        elseif ($request->type == 'assistant'){
            return redirect()->intended(RouteServiceProvider::ASSISTANT);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}