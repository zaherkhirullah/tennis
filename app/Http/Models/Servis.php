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
        return Servis::orderBy('created_at','desc')->get();
    }
    public static function all_deleted()
    {
        return Servis::where('durum',9)->orderBy('updated_at','desc')->get();
    }
    
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
    public static function musaitServisler($baslangis_saati)
    {
        $rezervasyonlar = Rezervasyon::all()
        ->where('baslangis', '=', $baslangis_saati)
        ->pluck('servis_id')->toArray();
        $servisler = Servis::all()->pluck('id')->toArray();
        $bos_servisler = [];
        foreach ($servisler as $item)
            if (!in_array($item, $rezervasyonlar))
                $bos_servisler [] = $item;
        return  $bos_servisler ;
    }
}
