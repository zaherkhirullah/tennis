<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;
use App\User;

class Kiralayan extends Model
{
    protected $table = 'kiralayans';
    protected $fillable = ['telefon','isim','durum',];
    
    public function AllKiralayanlar()
    {
        return $this->where('durum',0)->orderBy('created_at','desc');
    }
    public function AllDeletedKiralayanlar()
    {
        return $this->where('durum',1)->orderBy('updated_at','desc');
        
    }

    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
    public function User()
    {
        return $this->hasOne('App\User');
    }  
}
