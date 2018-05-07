<?php

namespace App\Http\Models;

use App\Http\Models\Kiralayan;
use Illuminate\Database\Eloquent\Model;

class Bekleyen extends Model
{
    protected $table='bekleyenler';


    public function kiralayan(){
        return $this->belongsTo(Kiralayan::class,'user_id')->first();
    }
}
