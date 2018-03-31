<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Kiralayan;
use App\Http\Models\Kort;
use App\Http\Models\Servis;

class Rezervasyon extends Model
{
    protected $table = 'rezervasyons';
    protected $fillable = [
        ' kort_id','kiralayan_id','servis_id',
        'baslangis_saat','bitis_at','tarih','servis_addresi',
        'servis_saat','odenecek','odenme_durumu',
    ];
    
    public function kiralayan()
    {
        return $this->belongsTo(Kiralayan::class);
    }
    public function kort()
    {
        return $this->belongsTo(Kort::class);
    }
    public function servis()
    {
        return $this->belongsTo(Kort::class);
    }
    
}
