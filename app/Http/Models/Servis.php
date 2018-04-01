<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;

class Servis extends Model
{
    protected $table = 'servis';
    protected $fillable = ['adi','plaka','sofor_adi',
                            'sofor_numurasi','isDeleted',  ];
  
    public function AllServisler()
    {
        return $this->orderBy('created_at','desc');
    }
    public function AllDeletedServisler()
    {
        return $this->where(['isDeleted',1])->orderBy('updated_at','desc');
        
    }
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
