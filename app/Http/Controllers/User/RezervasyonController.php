<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Http\Models\Kiralayan;
use App\Http\Models\Kort;
use App\Http\Models\Rezervasyon;

use App\Http\Models\Servis;
use Carbon\Carbon;

use App\Http\Requests\RezervasyonValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class RezervasyonController extends Controller
{
    
    public function index()
    {
        //
    }

 
    public function create()
    {
        $rezervasyonlar = Rezervasyon::all();
        $kortlar = Kort::all();
        $servisler = Servis::all();
        return view('admin.rezervasyon.create',compact([
            'rezervasyonlar',
            'kortlar',
            'servisler'

        ]));
    }

    public function store(RezervasyonValidation $request)
    {
        if($request->telefon && $request->isim){
            $kiralayan = new Kiralayan();
            $kiralayan->fill($request->all());
            $kiralayan->save();
            $kiralayan_id= $kiralayan->id;
        }else{
            $kiralayan_id=Auth::id();
        }

        $r = DB::Insert('call add_rezervasyon(?,?,?,?,?)',[
            $request->kort_id,
            $kiralayan_id,
            Carbon::now(),
            Carbon::now()->addHour(),
            $request->adres,
        ]);
        return "done";
    }

    public function iptal(Rezervasyon $rezervasyon){
        Rezervasyon::iptal($rezervasyon);
        Session::flash('success','iptal isleminiz gerceklestirildi');
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
        //
    }

    

    public function get_empty_hours($date){

    }
}
