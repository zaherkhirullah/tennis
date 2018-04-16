<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bekleyen extends Model
{
    protected $table='bekleyenler';


    public function user(){
        return $this->belongsTo(User::class);
    }
}
