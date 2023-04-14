<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('AdminPanel.adminLayout');
    }
    public function home(){
        return view('landing');

    }
    public function page(){
        return view('Card-Rendez-Vous');

    }
    

}
