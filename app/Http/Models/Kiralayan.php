<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;
use App\User;

class Kiralayan extends Model
{
    protected $table = 'kiralayans';
    protected $fillable = ['telefon','isim','durum',];
    
    public static function all_list()
    {
        return Kiralayan::where('durum',0)->orderBy('created_at','desc')->get();
    }
    public static function all_deleted()
    {
        return Kiralayan::where('durum',9)->orderBy('updated_at','desc')->get();
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
