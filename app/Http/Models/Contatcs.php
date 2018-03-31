<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contatcs extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['adi','email','konu','mesaje',];
    
}
