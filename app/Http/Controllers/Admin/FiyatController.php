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
        //
    }
 
    public function create()
    {
        //
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
