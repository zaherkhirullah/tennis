<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    protected $fillable = ['phone', 'name', 'status',];

    /**
     * @return mixed
     */
    public static function allList()
    {
        return Renter::where('status', 0)->orderBy('created_at', 'desc')->get();
    }

    /**
     * @return mixed
     */
    public static function allDeleted()
    {
        return Renter::where('status', 9)->orderBy('updated_at', 'desc')->get();
    }


    public function Reservations()
    {
        return $this->hasMany(Reservation::class);

    }

    public function User()
    {
        return $this->hasOne('App\User');
    }
}
