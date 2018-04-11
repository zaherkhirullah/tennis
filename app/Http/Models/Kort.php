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


    public static function all_deleted()
    {
        return Kort::where('durum',9)
        ->orderBy('updated_at','desc')->get();
    }

<<<<<<< HEAD

=======
>>>>>>> 158afb0cdb3476aaf818c20c42b5305113b5b368
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
