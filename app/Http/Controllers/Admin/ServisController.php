<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Servis;
use Illuminate\Http\Request;
use App\Http\Requests\ServisValidation;
use Session;
class ServisController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
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
        $servi->durum = 2 ;
        $servi->save();
        return redirect()->back();
    }
    public function mesgul(Servis $servi)
    {
        $servi->durum = 1 ;
        $servi->save();
        return redirect()->back();
    }
    public function calistir(Servis $servi)
    {
        $servi->durum = 0 ;
        $servi->save();
        return redirect()->back();
    }
    public function rezervasyonlar(Servis $servi)
    {
        
    }

    public function create()
    {
//        return 'sdf';
        return  view('admin.servis.create');
    }

    public function store(ServisValidation $request)
    {
        $servi = new Servis;
        $servi->isim ='Servis ' . str_random(2); 
        $servi->fill($request->all());
        $servi->save();        
        Session::flash('success','yeni servis basarile oluşturuldu');
        return redirect()->route('servis.index');
    }

    public function show(Servis $servi)
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
        Session::flash('success',$servi->isim.' servis belgileri basarile güncellendi');        
        return back();
    }

    public function destroy(Servis $servi)
    {
        //
    }
}
