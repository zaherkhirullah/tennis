<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use App\Models\Renter;
use App\Models\Reservation;
use App\Models\Service;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $services = Service::take(5)->get();
        $reservations = Reservation::take(5)->get();
        $renters = Renter::skip(1)->take(5)->get();
        $stages = Stage::take(5)->get();
        $data = [
            'services'      => $services,
            'reservations' => $reservations,
            'renters'   => $renters,
            'stages'        => $stages,
        ];
        return view("admin.dashboard")->with($data);
    }
}
