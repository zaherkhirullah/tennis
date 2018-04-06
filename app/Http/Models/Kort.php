<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rezervasyon;

class Kort extends Model
{
    protected $table = 'korts';
    protected $fillable = ['isim','tip','type_id','durum' ];
    
    public function AllKortlar()
    {
        return $this->orderBy('created_at','desc');
    }
    public function AllDeletedKortlar()
    {
        return $this->where('durum',1)->orderBy('updated_at','desc');
        
    }
    public function Rezervasyons()
    {
        return $this->hasMany(Rezervasyon::class);
    }
}
