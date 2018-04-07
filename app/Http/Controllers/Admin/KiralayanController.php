<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\KiralayanValidation;

use App\Http\Models\Kiralayan;
use App\Http\Models\Rezervasyon;
use App\User;

class KiralayanController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin');
    }
    public function index()
    {
        $kiralayan = new Kiralayan;
        $Kiralayanlar = $kiralayan->AllKiralayanlar()->get();
        return view('admin.kiralayan.index',compact('Kiralayanlar'));
    }
    public function silindi()
    {
        $kiralayan = new Kiralayan;
        $Kiralayanlar = $kiralayan->AllDeletedKiralayanlar()->get();
        return view('admin.kiralayan.index',compact('Kiralayanlar'));
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Kiralayan $kiralayan)
    {
        //
    }

    
    public function edit(Kiralayan $kiralayan)
    {
        //
    }

    public function update(Request $request, Kiralayan $kiralayan)
    {
        //
    }

    public function destroy(Kiralayan $kiralayan)
    {
        //
    }
}
