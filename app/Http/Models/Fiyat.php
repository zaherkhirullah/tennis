<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Kort;

class Fiyat extends Model
{
    protected $table = 'fiyats';
    protected $fillable = ['saat_fiyati', 'saat_puani',];
    
    public function Kort()
    {
        return $this->belongsTo(Kort::class);
    }
}
