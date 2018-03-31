<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;

class Servis extends Model
{
    protected $table = 'servis';
    protected $fillable = ['name','plaka','driver_name',
                            'driver_phone_number','status',  ];
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
