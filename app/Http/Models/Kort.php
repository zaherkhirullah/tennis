<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Fiyat;
use App\Http\Models\Rezervasyon;

class Kort extends Model
{
    protected $table = 'korts';
    protected $fillable = ['adi','durum','tip','fiyat_id' ];
    
    public function AllKortlar()
    {
        return $this->orderBy('created_at','desc');
    }
    public function AllDeletedKortlar()
    {
        return $this->orderBy('updated_at','desc');
        
    }


    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }

    public function fiyat()
    {
        return $this->belongsTo(Fiyat::class);
    }
}
