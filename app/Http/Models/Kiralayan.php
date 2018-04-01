<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;
use App\User;

class Kiralayan extends Model
{
    protected $table = 'kiralayans';
    protected $fillable = ['telefon','adi','isDeleted',];
    
    public function AllKiralayanlar()
    {
        return $this->orderBy('created_at','desc');
    }
    public function AllDeletedKiralayanlar()
    {
        return $this->where(['isDeleted',1])->orderBy('updated_at','desc');
        
    }

    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
