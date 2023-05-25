<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Renter;
use Auth;
use Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

    }

    public function profile()
    {
        $renter = Renter::find(Auth::id());
        $reservations = $renter->Reservations()->latest('start_at')->get();
        return view('users.profile', compact([
            'reservations',
        ]));

    }


}
