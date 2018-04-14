<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Kort;
use App\Http\Models\Rezervasyon;

use App\Http\Models\Servis;
class HomeController extends Controller
{
    // ana sayfa
    public function index()
    {
        $rezervasyonlar = Rezervasyon::all();
        $kortlar = Kort::all();
        $servisler = Servis::all();
        return view('home.home',compact([
            'rezervasyonlar',
            'kortlar',
            'servisler'
        ]));
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
