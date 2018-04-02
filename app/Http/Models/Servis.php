<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;

class Servis extends Model
{
    protected $table = 'servis';
    protected $fillable = ['isim','plaka','sofor_adi',
    'sofor_numarasi','durum',  ];
  
    public function AllServisler()
    {
        return $this->orderBy('created_at','desc');
    }
    public function AllDeletedServisler()
    {
        return $this->where('durum',1)->orderBy('updated_at','desc');
        
    }
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
