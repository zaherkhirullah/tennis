<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Http\Models\Kiralayan;
use App\Http\Models\Kort;
use App\Http\Models\Rezervasyon;

use App\Http\Models\Servis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\RezervasyonValidation;
use Illuminate\Support\Facades\DB;


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
        }
//        $rezervasyon = new Rezervasyon();
//        $rezervasyon->fill($request->all());
//        $rezervasyon->kiralayan_id = $kiralayan->id;
//        $rezervasyon->save();
        $r = DB::Insert('call add_rezervasyon(?,?,?,?,?)',[
            $request->kort_id,
            $kiralayan->id,
            Carbon::now(),
            Carbon::now()->addHour(),
            $request->adres,
        ]);
        return "done";
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
}
