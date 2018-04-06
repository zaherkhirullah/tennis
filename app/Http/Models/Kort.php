<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;

class Kort extends Model
{
    protected $table = 'korts';
<<<<<<< HEAD
    protected $fillable = 
    [
    'isim',
    'saat_puani',
    'saat_ucreti',
    'type',
    'durum'
];
=======
    protected $fillable = ['isim','type','durum','saat_ucreti','saat_puani' ];
>>>>>>> 8c5ef1437de4c59c712f87582b37e1d00b4478c8
    
    public function AllKortlar()
    {
        return $this->orderBy('created_at','desc')->get();
    }
    public function Deleted()
    {
        return $this->where('durum',1)->orderBy('updated_at','desc')->get();
        
    }
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
