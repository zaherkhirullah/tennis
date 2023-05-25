<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable =
        [
            'name',
            'hour_score',
            'hour_fee',
            'type',
            'status'
        ];

    public static function allList()
    {
        return Stage::where('status', '<>', 9)->orderBy('created_at', 'desc')->get();
    }

    public static function allDeleted()
    {
        return Stage::where('status', 9)
            ->orderBy('updated_at', 'desc')->get();
    }

    public function Reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
