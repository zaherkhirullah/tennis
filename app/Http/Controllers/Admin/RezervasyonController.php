<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


use App\Http\Models\bekleyen;
use App\Http\Models\Kort;
use App\Http\Models\Rezervasyon;

use App\Http\Models\Servis;
use Illuminate\Http\Request;
use App\Http\Requests\RezervasyonValidation;
use Session;
use Carbon\Carbon;

class RezervasyonController extends Controller
{
    
    public function __construct()
    {
      $this->middleware(['auth','admin']);
    }
    public function index()
    {
        // return Rezervasyon::all();
        $classes = ['Kort','Servis'];
        $class_ = isset($_GET['c']) ? $_GET['c'] : null ;
        $id = isset($_GET['i']) ? $_GET['i'] : null   ;

        if($class_ && $id){
            if(in_array($class_,$classes)){
                $class = "\App\Http\Models\\".$class_;
                if( $c = $class::find($id)){
                    $rezervasyonlar = Rezervasyon::all_list();
                    $gecmisler = Rezervasyon::gecmis()->where(strtolower($class_).'_id', '=',$id);
                    $sonrakiler= Rezervasyon::sonraki()->where(strtolower($class_).'_id', '=',$id);
                    $simdikiler= Rezervasyon::simdiki()->where(strtolower($class_).'_id', '=',$id);
                }else{
                    Session::flash('error','kayit bulunmadi') ;
                }
            }else{
                Session::flash('error','none valid class name') ;
                
            }
        }else{
            $rezervasyonlar = Rezervasyon::all_list();
            $gecmisler = Rezervasyon::gecmis();
            $sonrakiler= Rezervasyon::sonraki();
            $simdikiler= Rezervasyon::simdiki();
            $tumgelecekler= Rezervasyon::tumgelecek();

        }
        $bekleyenler = Bekleyen::all();
        return view('admin.rezervasyon.index',compact([
            'rezervasyonlar',
            'gecmisler',
            'sonrakiler',
            'simdikiler',
            'tumgelecekler',
            'bekleyenler',
        ]));

    }
    
    public function all_deleted()
    {
        $rezervasyonlar =  Rezervasyon::all_deleted();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
    }
    public function simdiki()
    {
        $simdikiler = Rezervasyon::simdiki();
        return view('admin.rezervasyon.simdiki',compact('simdikiler'));
    }
    public function sonraki()
    {
        $sonrakiler = Rezervasyon::sonraki();
        return view('admin.rezervasyon.sonraki',compact('sonrakiler'));
    }
    public function gecmis()
    {
        $gecmisler = Rezervasyon::gecmis();
        return view('admin.rezervasyon.gecmis',compact('gecmisler'));
    }
    
    public function create()
    {
        
    }
    public function store(RezervasyonValidation $request)
    {
    }

   
    public function show(Rezervasyon $rezervasyon)
    {
    }

    
    public function edit(Rezervasyon $rezervasyon)
    {

    }

    public function update(RezervasyonValidation $request, Rezervasyon $rezervasyon)
    {

    }
    public function destroy(Rezervasyon $rezervasyon)
    {
        $time=$rezervasyon->baslangis;
        $rezervasyon->delete();
        Session::flash('success',$time.' rezervasyounu belgileri basarile silinmiştir');        
        return back();
    }
}
