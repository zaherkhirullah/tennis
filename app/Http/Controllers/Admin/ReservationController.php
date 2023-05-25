<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationValidation;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Stage;
use App\Models\WaitingPeople;
use Illuminate\Support\Facades\Session;


class ReservationController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        // return Reservation::all();
        $classes = [Stage::class, Service::class];
        $class_ = isset($_GET['c']) ? $_GET['c'] : null;
        $id = isset($_GET['i']) ? $_GET['i'] : null;

        $reservations = Reservation::allList();
        $oldReservations = Reservation::oldReservations();
        $nextReservations = Reservation::nextReservations();
        $currentReservations = Reservation::current();
        $tumgelecekler = Reservation::tumgelecek();


        if ($class_ && $id) {
            if (in_array($class_, $classes)) {
                $class = "\App\Http\Models\\".$class_;
                if ($c = $class::find($id)) {
                    $reservations = Reservation::allList();
                    $oldReservations = Reservation::oldReservations()->where(strtolower($class_).'_id', '=', $id);
                    $nextReservations = Reservation::nextReservations()->where(strtolower($class_).'_id', '=', $id);
                    $currentReservations = Reservation::current()->where(strtolower($class_).'_id', '=', $id);
                } else {
                    Session::flash('error', 'kayit bulunmadi');
                }
            } else {
                Session::flash('error', 'none valid class name');
            }
        }
        $bekleyenler = WaitingPeople::all();
        return view('admin.reservation.index', compact([
            'reservations',
            'oldReservations',
            'nextReservations',
            'currentReservations',
            'tumgelecekler',
            'bekleyenler',
        ]));

    }

    public function oldReservations()
    {
        $oldReservations = Reservation::oldReservations();
        return view('admin.reservation.oldReservations', compact('oldReservations'));
    }

    public function nextReservations()
    {
        $nextReservations = Reservation::nextReservations();
        return view('admin.reservation.nextReservations', compact('nextReservations'));
    }

    public function current()
    {
        $currentReservations = Reservation::current();
        return view('admin.reservation.current', compact('currentReservations'));
    }

    public function allDeleted()
    {
        $reservations = Reservation::allDeleted();
        return view('admin.reservation.index', compact('reservations'));
    }

    public function create()
    {

    }

    public function store(ReservationValidation $request)
    {
    }


    public function show(Reservation $reservation)
    {
    }


    public function edit(Reservation $reservation)
    {

    }

    public function update(ReservationValidation $request, Reservation $reservation)
    {

    }

    public function destroy(Reservation $reservation)
    {
        $time = $reservation->start_at;
        $reservation->delete();
        Session::flash('success', $time.' rezervasyounu belgileri basarile silinmiştir');
        return back();
    }
}
