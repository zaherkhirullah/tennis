<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;

class Kort extends Model
{
    protected $table = 'korts';

    protected $fillable = 
    [
    'isim',
    'saat_puani',
    'saat_ucreti',
    'type',
    'durum'
];


    public function AllKortlar()
    {
        return $this->orderBy('created_at','desc')->get();
    }
    public function AllDeletedKortlar()
    {
        return $this->where('durum',1)->orderBy('updated_at','desc')->get();
        
    }
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
