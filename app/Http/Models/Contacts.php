<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'isim',
        'email',
        'konu',
        'mesaj',
        'durum',  
    ];
    public static function all_list()
    {
        return Contacts::where('durum',0)->orderBy('created_at','desc')->get();
    }
    public static function all_deleted()
    {
        return Contacts::where('durum',9)->orderBy('updated_at','desc')->get();
    }
}
