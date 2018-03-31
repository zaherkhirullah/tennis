<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }
    
    public function rezervasyonAl()
    {
        return view('home.rezervasyonAl');
    }

    public function aboutUs()
    {
        return view('home.aboutUs');
    }

    public function prices()
    {
        return view('home.prices');
    }

    public function terms()
    {
        return view('home.terms');
    }
    
}
