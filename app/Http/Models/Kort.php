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
    'saat_ucreti'   ,
    'type',
    'durum'
];

    public static function all_list()
    {
        return Kort::where('durum','<>',9)->orderBy('created_at','desc')->get();
    }
    public static function all_deleted()
    {
        return Kort::where('durum',9)
        ->orderBy('updated_at','desc')->get();
    }
    
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
