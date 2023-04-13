<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleUserController extends Controller
{
    public function loginForm($type){
        return view ('login',compact('type'));
    }
}
