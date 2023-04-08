<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('landing');
    }
    public function medecin(){
        return view('AdminPanel.adminLayout');
    }
    public function assistant(){
        return view('AdminPanel.adminLayout');

    }
}
