<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use App\Models\Reservation;
use App\Models\Service;

class HomeController extends Controller
{
    // ana sayfa
    public function index()
    {
        $reservations = Reservation::all();
        $stages = Stage::all();
        $services = Service::all();
        return view('home.home', compact([
            'reservations',
            'stages',
            'services'
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
