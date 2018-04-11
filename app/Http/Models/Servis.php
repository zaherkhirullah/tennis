<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;

class Servis extends Model
{
    protected $table = 'servis';
    protected $fillable = [
        'isim',
        'plaka',
        'sofor_adi',
        'sofor_numarasi',
        'durum',
    ];
    public static function all_list()
    {
        return Servis::where('durum',0)->orderBy('created_at','desc')->get();
    }
    public static function all_deleted()
    {
        return Servis::where('durum',9)->orderBy('updated_at','desc')->get();
    }
    
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
