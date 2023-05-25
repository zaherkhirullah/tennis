<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationValidation;
use App\Models\Renter;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Stage;
use App\Models\WaitingPeople;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;


class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::allList();
        $oldReservations = Reservation::oldReservations();
        $nextReservations = Reservation::nextReservations();
        $currentReservations = Reservation::current();
        $tumgelecek = Reservation::tumgelecek();
        $bekleyenler = WaitingPeople::all();

        return view('admin.reservation.index', compact([
            'reservations',
            'oldReservations',
            'nextReservations',
            'currentReservations',
            'tumgelecek',
            'bekleyenler',
        ]));
    }


    public function create()
    {
        $reservations = Reservation::all();
        $stages = Stage::all();
        $services = Service::all();

        return view('admin.reservation.create', compact([
            'reservations',
            'stages',
            'services'

        ]));
    }

    public function store(ReservationValidation $request)
    {
        $tarih = $request->tarih;
        $hour = $request->hour;
        if (!$tarih) {
            Session::flash('error', "lutfen tarih secin ");

            return back();
        }
        if (!$hour) {
            Session::flash('error', "lutfen hour secin ");

            return back();
        }

        $hour = substr($hour, 0, strpos($hour, ' '));
        $start_at_houri = $tarih.' '.$hour.':00';
        $start_at_houri = Carbon::parse($start_at_houri);
        $end_at_houri = Carbon::parse($start_at_houri)->addHour();

        if ($request->phone && $request->name) {
            $renter = new Renter();
            $renter->fill($request->all());
            $renter->save();
            $renter_id = $renter->id;
        } elseif (Auth::id()) {
            $renter_id = Auth::id();
        } else {
            Session::flash('error', "Hata olustu ");
        }

        $bos_services = Service::musaitServisler($start_at_houri);

        $reservation = DB::Insert('call add_reservation(?,?,?,?,?,?)', [
            $request->stage_id,
            $renter_id,
            $start_at_houri,
            $end_at_houri,
            $request->service_address,
            $bos_services[0]
        ]);
        $kiralaya = Renter::find($renter_id);
        if ($reservation) {
            Session::flash('success', "sayin {$kiralaya->name} reservation basariyla olusturulmustur { $start_at_houri }");
        } else {
            Session::flash('error', "Hata olustu ");
        }

        return back();
    }

    public function iptal(Reservation $reservation)
    {
        Reservation::iptal($reservation);
        Session::flash('success', 'iptal isleminiz gerceklestirildi');

        return back();
    }

    public function show(Reservation $reservation)
    {
        //
    }


    public function edit(Reservation $reservation)
    {
        //
    }

    public function update(ReservationValidation $request, Reservation $reservation)
    {
        //
    }

    public function destroy(Reservation $reservation)
    {
        $time = $reservation->start_at;
        $reservation->delete();
        Session::flash('success', $time.' rezervasyounu belgileri basarile silinmiştir');

        return back();
    }


    public function getview()
    {
        return view('home.reservation');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function getEmptyHours(Request $request)
    {
        $day = $request->day;  // request gunu
        $month = $request->month;// request ayı
        $year = $request->year; // request yılı

        $date = Carbon::parse("$year-$month-$day"); // requestin tum tarihi

        $sonraki_hour = $n = Carbon::now()->hour + 1; // current sattan bir hour sonra
        // eger bugunku tarihi şimdiki hour al else sabah hour 9 Al
        $n = ($date == Today()) ? $sonraki_hour : 9;
        // aktive hourler tanimlama
        $av_hours = [];
        for ($i = $n; $i < 20; $i++) {
            $av_hours[] = $i;
        }

        $reservations = DB::table('reservations')
            ->whereDate('start_at', '=', $date)
            ->where('stage_id', '=', $request->stage)
            ->pluck('start_at')->toArray();
        foreach ($reservations as $rez_time) {
            $rez_time = Carbon::parse($rez_time);
            $index = array_search($rez_time->hour, $av_hours);
            if ($index !== false) {
                $av_hours[$index] = 0;
            }
        }
        $av_hour = [];
        foreach ($av_hours as $av_hour) {
            if ($av_hour != 0) {
                $av_hour[] = $av_hour;
            }
        }
        $av_hour = ($date < Today()) ? "" : $av_hour;

        return response()->json($av_hour);
    }

    /**
     * @return Factory|Application|View
     */
    public function landing()
    {
        $stages = Stage::allList();

        return view('home.landing', compact([
            'stages'
        ]));
    }

    /**
     * @param  Reservation  $reservation
     * @return RedirectResponse
     */
    public function extension(Reservation $reservation): \Illuminate\Http\RedirectResponse
    {
        if ($reservation->uzatabilir()) {
            $yeni_reservation = new Reservation();
            $yeni_reservation->fill($reservation->toArray());
            $yeni_reservation->start_at = $reservation->end_at;
            $yeni_reservation->service_id = null;
            $yeni_reservation->service_address = null;
            $yeni_reservation->end_at = Carbon::parse($reservation->end_at)->addHour();
            $yeni_reservation->save();
            Session::flash('success', 'extension isleminiz basarile ulasilmistir');
        } else {
            Session::flash('error', 'bir hata olustu ');
        }

        return back();
    }

    /**
     * @param  Reservation  $reservation
     * @return RedirectResponse
     */
    public function waiting(Reservation $reservation): RedirectResponse
    {
        if ($reservation->suan()) {
            $bekleyen = new WaitingPeople();
            $bekleyen->user_id = $reservation->renter_id;
            $bekleyen->save();
            Session::flash('success', 'waiting listesine alindi');
        } else {
            Session::flash('error', 'bir hata olustu ');
        }

        return back();
    }
}
