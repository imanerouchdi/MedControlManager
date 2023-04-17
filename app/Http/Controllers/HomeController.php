<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('Mylayout.landing');
    }
    
    public function page(){
        return view('RdvPanel.Card-rendez-vous');

    }
    public function dashboard(){
        return view('AdminPanel.adminLayout');
    }
    

}
