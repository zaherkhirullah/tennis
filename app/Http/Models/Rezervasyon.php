<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Kiralayan;
use App\Http\Models\Kort;
use App\Http\Models\Servis;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Rezervasyon extends Model
{
    protected $table = 'rezervasyons';
    protected $fillable = [
        'kort_id',
        'kiralayan_id',
        'servis_id',
        'baslangis',
        'bitis',
        'servis_adresi',
        'servis_saat',
        'odenecek',
        'odenmis',
        'kazanacak_puan',
        'durum',
    ];

    public static function all_list()
    {
        return Rezervasyon::where('durum',0)->orderBy('created_at','desc')->get();
    }
    public static function all_deleted()
    {
        return Rezervasyon::where('durum',9)->orderBy('updated_at','desc')->get();
    }
    public static function simdiki()
    {
        return Rezervasyon::where('baslangis','<=',Carbon::now())
            ->where('bitis','>',Carbon::now());
    }
    public static function sonraki()
    {
        return Rezervasyon::where('baslangis','<=',Carbon::now()->addHour())
            ->where('bitis','>',Carbon::now()->addHour())
            ->get();
    }
    public static function gecmis()
    {
        return Rezervasyon::where('baslangis','<',Carbon::now()->subHour())->get();
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

    public static function iptal(Rezervasyon $rezervasyon)
    {
        $rezervasyon->durum = 9;
        $rezervasyon->update();
        return $rezervasyon;
    }
}
