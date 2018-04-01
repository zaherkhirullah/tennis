<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\FiyatValidation;

use App\Http\Models\Fiyat;
use App\Http\Models\Kort;

class FiyatController extends Controller
{
   
    public function index()
    {
        $fiyat = new Fiyat;
        $fiyatlar = $fiyat->AllFiyats()->get();
        return view('admin.fiyat.index',compact('fiyatlar'));
    }
    public function silindi()
    {
        $fiyat = new Fiyat;
        $fiyatlar = $fiyat->AllDeletedFiyats()->get();
        return view('admin.fiyat.index',compact('fiyatlar'));
    }

 
    public function store(FiyatValidation $request)
    {
        //
    }


    public function show(Fiyat $fiyat)
    {
        //
    }


    public function edit(Fiyat $fiyat)
    {
        //
    }

    public function update(FiyatValidation $request, Fiyat $fiyat)
    {
        //
    }

    public function destroy(Fiyat $fiyat)
    {
        //
    }
}
