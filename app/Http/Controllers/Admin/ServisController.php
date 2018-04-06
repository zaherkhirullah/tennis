<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Servis;
use Illuminate\Http\Request;
use App\Http\Requests\ServisValidation;

class ServisController extends Controller
{
    public function index()
    {
        $servis = new Servis;
        $servisler = $servis->AllServisler()->get();
        return view('admin.servis.index',compact('servisler'));
    }
    public function silindi()
    {
        $servis = new Servis;
        $servisler = $servis->AllDeletedServisler()->get();
        return view('admin.servis.index',compact('servisler'));
    }
    public function tamir(Servis $servi)
    {
        $servis->durum = 1 ;
        $servis->save();
        return redirect()->back();
    }
    public function calistir(Servis $servi)
    {
        $servis->durum = 0 ;
        $servis->save();
        return redirect()->back();
    }
    public function rezervasyonlar(Servis $servis)
    {
        
    }

    public function create()
    {
//        return 'sdf';
        return  view('admin.servis.create');
    }

    public function store(ServisValidation $request)
    {
        return $request;
    }

    public function show(Servis $servis)
    {
        return  view('admin.servis.show');
        
    }

    public function edit(Servis $servi)
    {
       // $servis = Servis::find($servi);
       // return $servi;
        return  view('admin.servis.edit',compact('servi'));
    }

    public function update(ServisValidation $request, Servis $servi)
    {
//        return $servi;
        //return $request->all();
        $servi->update($request->all());
        return back();
    }

    public function destroy(Servis $servis)
    {
        //
    }
}
