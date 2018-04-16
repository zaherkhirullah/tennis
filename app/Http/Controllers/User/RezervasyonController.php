<?php

namespace App\Http\Controllers\User;

use App\bekleyen;
use App\Http\Controllers\Controller;
use App\Http\Models\Kiralayan;
use App\Http\Models\Kort;
use App\Http\Models\Rezervasyon;
use App\Http\Models\Servis;
use App\Http\Requests\RezervasyonValidation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class RezervasyonController extends Controller
{

    public function index()
    {
        $rezervasyonlar = Rezervasyon::all_list();
        $gecmisler = Rezervasyon::gecmis();
        $sonrakiler = Rezervasyon::sonraki();
        $simdikiler = Rezervasyon::simdiki();
        return view('admin.rezervasyon.index', compact([
            'rezervasyonlar',
            'gecmisler',
            'sonrakiler',
            'simdikiler',
        ]));
    }


    public function create()
    {
        $rezervasyonlar = Rezervasyon::all();
        $kortlar = Kort::all();
        $servisler = Servis::all();
        return view('admin.rezervasyon.create', compact([
            'rezervasyonlar',
            'kortlar',
            'servisler'

        ]));
    }

    public function store(RezervasyonValidation $request)
    {
        $tarih = $request->tarih;
        $saat = $request->saat;
        $saat = substr($saat, 0, strpos($saat, ' '));
        $baslangis_saati = $tarih . ' ' . $saat . ':00';
        $baslangis_saati = Carbon::parse($baslangis_saati);
        $bitis_saati = Carbon::parse($baslangis_saati)->addHour();

        if ($request->telefon && $request->isim)
         {
            $kiralayan = new Kiralayan();
            $kiralayan->fill($request->all());
            $kiralayan->save();
            $kiralayan_id = $kiralayan->id;
        } 
        elseif(Auth::id())
            $kiralayan_id = Auth::id();
        else
        Session::flash('error', "Hata olustu ");
        
        $bos_servisler = Servis::musaitServisler($baslangis_saati);
        
       $rezerv= DB::Insert('call add_rezervasyon(?,?,?,?,?,?)', [
            $request->kort_id,
            $kiralayan_id,
            $baslangis_saati,
            $bitis_saati,
            $request->servis_adresi,
            $bos_servisler[0]
        ]);
        $kiralaya = Kiralayan::find($kiralayan_id);
        if($rezerv)
        Session::flash('success', "sayin {$kiralaya->isim} rezervasyon basariyla olusturulmustur { $baslangis_saati }");
        else
        Session::flash('error', "Hata olustu "); 

        return back();
    }

    public function iptal(Rezervasyon $rezervasyon)
    {
        Rezervasyon::iptal($rezervasyon);
        Session::flash('success', 'iptal isleminiz gerceklestirildi');
        return back();
    }

    public function show(Rezervasyon $rezervasyon)
    {
        //
    }


    public function edit(Rezervasyon $rezervasyon)
    {
        //
    }

    public function update(RezervasyonValidation $request, Rezervasyon $rezervasyon)
    {
        //
    }
    public function destroy(Rezervasyon $rezervasyon)
    {
        $time=$rezervasyon->baslangis;
        $rezervasyon->delete();
        Session::flash('success',$time.' rezervasyounu belgileri basarile silinmiştir');        
        return back();
    }
   

    public function getview()
    {
        return view('home.rezervasyon');
    }

    public function get_empty_hours(Request $request)
    {
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $kort = $_POST['kort'];
        $date = "$year-$month-$day";
        $date = Carbon::parse($date);
        $hours = [];
        $av_hours = [9, 8, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19];
        $rezervasyonlar = DB::table('rezervasyons')
            ->whereDate('baslangis', '=', $date)
            ->where('kort_id', '=', $kort)
            ->pluck('baslangis')->toArray();


        foreach ($rezervasyonlar as $item) {
            $item = Carbon::parse($item);
            $hours [] = $item->hour;
            $index = 0;
            if (($index = array_search($item->hour, $av_hours)) !== false) {

                $av_hours[$index] = 0;
            }

        }
        $av_saat = [];
        foreach ($av_hours as $av_hour) {
            if ($av_hour != 0) {
                $av_saat[] = $av_hour;
            }
        }

        return response()->json($av_saat);


    }


    public function landing()
    {
        $kortlar = Kort::all_list();
        return view('home.landing', compact([
            'kortlar'
        ]));
    }

    public function uzatma(Rezervasyon $rezervasyon)
    {
        if ($rezervasyon->uzatabilir()) {
            $yeni_rezervasyon = new Rezervasyon();
            $yeni_rezervasyon->fill($rezervasyon->toArray());
            $yeni_rezervasyon->baslangis = $rezervasyon->bitis;
            $yeni_rezervasyon->servis_id = NULL;
            $yeni_rezervasyon->servis_adresi = NULL;
            $yeni_rezervasyon->bitis = Carbon::parse($rezervasyon->bitis)->addHour();
            $yeni_rezervasyon->save();
            Session::flash('success', 'uzatma isleminiz basarile ulasilmistir');
        } else
            Session::flash('error', 'bir hata olustu ');
        return back();
    }

    /**
     * @param Rezervasyon $rezervasyon
     */
    public function bekleme(Rezervasyon $rezervasyon)
    {
        if ($rezervasyon->suan()) {
            $bekleyen = new Bekleyen();
            $bekleyen->user_id = $rezervasyon->kiralayan_id;
            $bekleyen->save();
            Session::flash('success', 'bekleme listesine alindi');
        } else
            Session::flash('error', 'bir hata olustu ');
        return back();
    }


}
