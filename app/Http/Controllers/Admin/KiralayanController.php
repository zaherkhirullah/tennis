<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\KiralayanValidation;

use App\Http\Models\Kiralayan;
use App\Http\Models\Rezervasyon;
use App\User;
use Session;

class KiralayanController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth','admin']);
    }
    
    public function index()
    {
        $Kiralayanlar = Kiralayan::all_list(); 
        return view('admin.kiralayan.index',compact('Kiralayanlar'));
    }
    
    public function all_deleted()
    {
        $Kiralayanlar = Kiralayan::all_deleted(); 
        return view('admin.kiralayan.index',compact('Kiralayanlar'));
    }
    
    public function create()
    {
        return  view('admin.kiralayan.create');        
    }

    public function store(KiralayanValidation $request)
    {
        $kiralayan = new Kiralayan;
        $kiralayan->fill($request->all());
        $kiralayan->save();
        return redirect()->route('kiralayan.index');
    }

    public function show(Kiralayan $kiralayan)
    {
        return  view('admin.kiralayan.show',compact('kiralayan'));
    }

    public function edit(Kiralayan $kiralayan)
    {
        return view('admin.kiralayan.edit',compact('kiralayan'));
    }
    
    public function update(KiralayanValidation $request, Kiralayan $kiralayan)
    {
        $kiralayan->update($request->all());
        Session::flash('success',$kiralayan->isim.' kiralayan belgileri basarile güncellendi');
        return back();
    }

    public function delete(Kiralayan $kiralayan)
    {
        return view('admin.kiralayan.delete',compact('kiralayan'));
    }
    
    public function destroy(Kiralayan $kiralayan)
    {
        $isim = $kiralayan->isim;
        $kiralayan->delete($kiralayan);
        Session::flash('success',$isim.' kiralayan belgileri basarile silinmiş');        
        return back();
    }
}
