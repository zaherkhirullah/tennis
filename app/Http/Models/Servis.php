<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;

class Servis extends Model
{
    protected $table = 'servis';
    protected $fillable = ['adi','plaka','sofor_adi',
                            'sofor_numurasi','durum',  ];
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
