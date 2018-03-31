<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;
use App\User;

class Kiralayan extends Model
{
    protected $table = 'kiralayans';
    protected $fillable = ['telefon','adi',];
    
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
