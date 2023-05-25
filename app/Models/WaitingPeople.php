<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaitingPeople extends Model
{
    protected $table = 'waiting_people';


    public function renter()
    {
        return $this->belongsTo(Renter::class, 'user_id')->first();
    }
}
