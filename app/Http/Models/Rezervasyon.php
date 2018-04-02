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
        'baslangis_saat','bitis_saat','tarih','servis_adresi',
        'servis_saat','odenecek','odenmis','kazanacak_puan','durum',
    ];

    public function AllRezervasyonlar()
    {
        return $this->where('durum',0)->orderBy('created_at','desc');
    }
    public function simdikiRezervasyonlar()
    {
        return $this->where('tarih','>',Today())->orderBy('created_at','desc');
    }
    public function sonrakiRezervasyonlar()
    {
        return $this->where('tarih',Today())->orderBy('created_at','desc');
    }
    public function gecmisRezervasyonlar()
    {
        return $this->where('tarih','<',Today())->orderBy('created_at','desc');
    }
    
    public function AllDeletedRezervasyonlar()
    {
        return $this->where('durum',1)->orderBy('updated_at','desc');
        
    }

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
        return $this->belongsTo(Servis::class);
    }
}
