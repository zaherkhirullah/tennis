<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['isim','email','konu','mesaj','durum',];
    
    public function AllContacts()
    {
        return $this->orderBy('created_at','desc')->get();
    }    
}
