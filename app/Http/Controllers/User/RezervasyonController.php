<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Http\Models\Kort;
use App\Http\Models\Rezervasyon;

use Illuminate\Http\Request;
use App\Http\Requests\RezervasyonValidation;


class RezervasyonController extends Controller
{
    
    public function index()
    {
        //
    }

 
    public function create()
    {
        $rezervasyonlar = Rezervasyon::all();
        $kortlar = Kort::AllKortlar();
        return view('admin.rezervasyon.create',compact([
            'rezervasyonlar',
            'kortlar',

        ]));
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
