<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'number_plate',
        'driver_name',
        'driver_phone',
        'status',
    ];

    public static function allList()
    {
        return Service::where('status', '<>', 9)->orderBy('created_at', 'desc')->get();
    }

    public static function allDeleted()
    {
        return Service::where('status', 9)->orderBy('updated_at', 'desc')->get();
    }

    public function Reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public static function musaitServisler($start_at_houri)
    {
        $reservations = Reservation::all()
            ->where('start_at', '=', $start_at_houri)
            ->pluck('service_id')->toArray();
        $services = Service::all()->pluck('id')->toArray();
        $bos_services = [];
        foreach ($services as $item) {
            if (!in_array($item, $reservations)) {
                $bos_services [] = $item;
            }
        }
        return $bos_services;
    }
}
