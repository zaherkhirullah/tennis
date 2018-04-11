<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Rezervasyon;

use Illuminate\Http\Request;
use App\Http\Requests\RezervasyonValidation;


class RezervasyonController extends Controller
{
    
    public function __construct()
    {
      $this->middleware(['auth','admin']);
    }

    public function simdiki()
    {
        $rezervasyon = new Rezervasyon;
        $rezervasyonlar = $rezervasyon->simdikiRezervasyonlar();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
    }
    public function sonraki()
    {
        $rezervasyon = new Rezervasyon;
        $rezervasyonlar = $rezervasyon->sonrakiRezervasyonlar();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
    }
    public function gecmis()
    {
        $rezervasyon = new Rezervasyon;
        $rezervasyonlar = $rezervasyon->gecmisRezervasyonlar();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
    }
    
    public function index()
    {
        $rezervasyon = new Rezervasyon;
        $rezervasyonlar = $rezervasyon->AllRezervasyonlar();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
    }
    public function silindi()
    {
        $rezervasyon = new Rezervasyon;
        $rezervasyonlar = $rezervasyon->AllDeletedRezervasyonlar();
        return view('admin.rezervasyon.index',compact('rezervasyonlar'));
    }
    public function create()
    {
    }
    public function store(RezervasyonValidation $request)
    {
        //
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
