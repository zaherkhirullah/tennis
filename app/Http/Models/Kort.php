<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Fiyat;
use App\Http\Models\Rezervasyon;

class Kort extends Model
{
    protected $table = 'korts';
    protected $fillable = ['adi','tip','fiyat_id','isDeleted' ];
    
    public function AllKortlar()
    {
        return $this->orderBy('created_at','desc');
    }
    public function AllDeletedKortlar()
    {
        return $this->where(['isDeleted',1])->orderBy('updated_at','desc');
        
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
