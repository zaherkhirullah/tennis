<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Kort;
use Illuminate\Http\Request;
use App\Http\Requests\KortValidation;

class KortController extends Controller
{
   
    public function index()
    {
        $kort = new Kort;
        $kortlar = $kort->AllKortlar()->get();
        return view('admin.kort.index',compact('kortlar'));
    }
    public function silindi()
    {
        $kort = new Kort;
        $kortlar = $kort->AllDeletedKortlar()->get();
        return view('admin.kort.index',compact('kortlar'));
    }

  
    public function create()
    {
        //
    }

    
    public function store(KortValidation $request)
    {
        //
    }


    public function show(Kort $kort)
    {
        //
    }

  
    public function edit(Kort $kort)
    {
        //
    }

  
    public function update(KortValidation $request, Kort $kort)
    {
        //
    }

   
    public function destroy(Kort $kort)
    {
        //
    }
}
