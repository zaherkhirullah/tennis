<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Kort;

class Fiyat extends Model
{
    protected $table = 'fiyats';
    protected $fillable = ['saat_fiyati', 'saat_puani',];
    
    public function AllFiyatlar()
    {
        return $this->orderBy('created_at','desc');
    }
    public function AllDeletedFiyatlar()
    {
        return $this->orderBy('updated_at','desc');
        
    }
    public function kortlar()
    {
        return $this->hasMany(Kort::class);
    }
}
