<?php

namespace App\Http\Models;

use App\bekleyen;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Kiralayan;
use App\Http\Models\Kort;
use App\Http\Models\Servis;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        return Rezervasyon::where([
            ['baslangis','>=', Carbon::now()->startOfHour()->addHour()],
            ['bitis','<=',Carbon::now()->startOfHour()->addHour(2)]
        ])->get();
    }

    public static function gecmis()
    {
        return Rezervasyon::where([
            ['baslangis','<',Carbon::now()->subHour()],
            ['baslangis','>',Carbon::now()->startOfDay()],
        ])->get();
    }
    public static function tumgelecek()
    {
        return Rezervasyon::where([
            ['baslangis','>=', Carbon::now()->startOfHour()->addHour()],
            ['bitis','<=',Carbon::now()->endOfDay()]
        ])->get();
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

    public  function suan()
    {
        if ($this->baslangis <= Carbon::now() && $this->bitis > Carbon::now()){
            return true;
        }else{
            return false;
        }
    }

    public function uzatabilir(){
        if ($this->suan()){
            $rez = Rezervasyon::where([
                ['kort_id', '=', $this->kort_id],
                ['baslangis', '=', $this->bitis],
            ])->first();
             if(!$rez)
                 return true ;
        }
        return false;
    }

    public function sonraki_oyun(){

        $rez = Rezervasyon::where([
            ['kiralayan_id','=',$this->kiralayan_id],
            ['baslangis','=', $this->bitis ],
        ])->first();

        return $rez ? true : false;
    }


    public function bekleyen(){
        $bekelyen = Bekleyen::where('user_id','=',$this->kiralayan_id)->first();
        return $bekelyen ? true : false;
    }
}
