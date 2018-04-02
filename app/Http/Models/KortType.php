<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Kort;

class KortType extends Model
{
    protected $table = 'kort_types';
    protected $fillable = ['isim','saat_fiyati', 'saat_puani','durum',];
    
    public function AllKortTypes()
    {
        return $this->where('durum',0)->orderBy('created_at','desc');
    }
    public function AllDeletedKortTypes()
    {
        return $this->where('durum',1)->orderBy('updated_at','desc');
        
    }
    public function kortlar()
    {
        return $this->hasMany(Kort::class);
    }
}
