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
	  $this->middleware(['auth','admin']);
	}
	public function index()
	{
		$servisler = Servis::all_list();
		return view('admin.servis.index',compact('servisler'));
	}
	public function all_deleted()
	{
		$servisler =  Servis::all_deleted();
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
		$servi->durum = 1;
		$servi->save();
		return redirect()->back();
	}
	public function calistir(Servis $servi)
	{
		$servi->durum = 0 ;
		$servi->save();
		return redirect()->back();
	}

	public function list_rezervasyon(Servis $servi)
	{
		
	}

	public function create()
	{
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
		return  view('admin.servis.show',compact('servi'));
		
	}

	public function edit(Servis $servi)
	{
		return  view('admin.servis.edit',compact('servi'));
	}

	public function update(ServisValidation $request, Servis $servi)
	{
		$servi->update($request->all());
		Session::flash('success',$servi->isim.' servis belgileri basarile güncellendi');        
		return redirect()->route('servis.index');
	}
	public function delete(Servis $servi)
    {
        return view('admin.servis.delete',compact('servi'));
	}
	public function p_delete( Servis $servi)
    {
		$servi->durum=9;
		$servi->save();
		Session::flash('success',$servi->isim.' servis belgileri basarile silindi');        
		return redirect()->route('servis.index');
	}
	public function restore(Servis $servi)
    {
        return view('admin.servis.delete',compact('servi'));
	}
	public function p_restore( Servis $servi)
    {
		$servi->durum=0;
		$servi->save();
		Session::flash('success',$servi->isim.' servis belgileri basarile silindi');        
		return redirect()->route('servis.index');
    }
	public function destroy(Servis $servi)
	{  	
		 $isim=$servi->isim;
		$servi->delete($servi);
		Session::flash('success',$isim.' servis belgileri basarile silinmiş');        
		return redirect()->route('servis.index');
	}
}
