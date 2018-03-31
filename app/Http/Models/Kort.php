<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Fiyat;
use App\Http\Models\Rezervasyon;

class Kort extends Model
{
    protected $table = 'korts';
    protected $fillable = ['adi','durum','tip','fiyat_id' ];
    
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
