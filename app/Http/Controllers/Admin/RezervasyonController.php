<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Rezervasyon;

use Illuminate\Http\Request;
use App\Http\Requests\RezervasyonValidation;
use Session;

class RezervasyonController extends Controller
{
    
    public function __construct()
    {
      $this->middleware(['auth','admin']);
    }
    public function index()
    {
        $rezervasyonlar = Rezervasyon::all_list();
        $gecmisler = Rezervasyon::gecmis();
        $sonrakilar= Rezervasyon::sonraki();
        $simdikiler= Rezervasyon::simdiki();
        return view('admin.rezervasyon.index',compact([
            'rezervasyonlar',
            'gecmisler',
            'sonrakilar',
            'simdikiler',
        ]));  }
    
    public function all_deleted()
    {
        $rezervasyonlar =  Rezervasyon::all_deleted();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
    }
    public function simdiki()
    {
        $rezervasyonlar = Rezervasyon::simdiki();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
    }
    public function sonraki()
    {
        $rezervasyonlar = Rezervasyon::sonraki();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
    }
    public function gecmis()
    {
        $rezervasyonlar = Rezervasyon::gecmis();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
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
        $isim=$rezervasyon->isim;
        $rezervasyon->delete($rezervasyon);
        Session::flash('success',$isim.' servis belgileri basarile silinmiş');        
        return back();
    }
}
