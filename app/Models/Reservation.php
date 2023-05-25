<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'stage_id',
        'renter_id',
        'service_id',
        'start_at',
        'end_at',
        'service_address',
        'service_hour',
        'payable',
        'paid',
        'win_points',
        'status',
    ];

    public static function allList()
    {
        return Reservation::where('status', 0)->orderBy('created_at', 'desc')->get();
    }

    public static function allDeleted()
    {
        return Reservation::where('status', 9)->orderBy('updated_at', 'desc')->get();
    }

    public static function current()
    {
        return Reservation::where([
            ['start_at', '<=', Carbon::now()],
            ['end_at', '>', Carbon::now()]
        ])->get();
    }

    public static function nextReservations()
    {
        return Reservation::where([
            ['start_at', '>=', Carbon::now()->startOfHour()->addHour()],
            ['end_at', '<=', Carbon::now()->startOfHour()->addHour(2)]
        ])->get();
    }

    public static function oldReservations()
    {
        return Reservation::where([
            ['start_at', '<', Carbon::now()->subHour()],
            ['start_at', '>', Carbon::now()->startOfDay()],
        ])->get();
    }

    public static function tumgelecek()
    {
        return Reservation::where([
            ['start_at', '>=', Carbon::now()->startOfHour()->addHour()],
            ['end_at', '<=', Carbon::now()->endOfDay()]
        ])->get();
    }

    public function renter()
    {
        return $this->belongsTo(Renter::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function Service()
    {
        return $this->belongsTo(Service::class);
    }

    public static function iptal(Reservation $reservation)
    {
        $reservation->delete();

        return $reservation;
    }

    public function suan()
    {
        if ($this->start_at <= Carbon::now() && $this->end_at > Carbon::now()) {
            return true;
        } else {
            return false;
        }
    }

    public function uzatabilir()
    {
        if ($this->suan()) {
            $rez = Reservation::where([
                ['stage_id', '=', $this->stage_id],
                ['start_at', '=', $this->end_at],
            ])->first();
            if (!$rez) {
                return true;
            }
        }

        return false;
    }

    public function sonraki_oyun()
    {

        $rez = Reservation::where([
            ['renter_id', '=', $this->renter_id],
            ['start_at', '=', $this->end_at],
        ])->first();

        return $rez ? true : false;
    }


    public function bekleyen()
    {
        $bekelyen = WaitingPeople::where('user_id', '=', $this->renter_id)->first();

        return $bekelyen ? true : false;
    }
}
