<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Kort;

class Fiyat extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name','display_name',];
    
    public function Kort()
    {
        return $this->belongsTo(Kort::class);
    }
}
