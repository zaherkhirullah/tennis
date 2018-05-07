<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Kort;
use Illuminate\Http\Request;
use App\Http\Requests\KortValidation;
use Session;
class KortController extends Controller
{   
    public function __construct()
    {
      $this->middleware(['auth','admin']);
    }
   
    public function index()
    {
        $kortlar = Kort::all_list();
        return view('admin.kort.index',compact('kortlar'));
    }
    public function all_deleted()
    {
        $kortlar = Kort::all_deleted();
        return view('admin.kort.index',compact('kortlar'));
    }
    public function tamir(Kort $kort)
    {
        $kort->durum = 2 ;
        $kort->save();
        return back();
    }
    public function mesgul(Kort $kort)
    {
        $kort->durum = 1 ;
        $kort->save();
        return back();
    }
    public function calistir(Kort $kort)
    {
        $kort->durum = 0 ;
        $kort->save();
        return back();
    }
  
    public function create()
    {
        return  view('admin.kort.create');
    }

    
    public function store(KortValidation $request)
    {
        $kort = new Kort;
        $kort->fill($request->all());
        $kort->save();
        return redirect()->route('kort.index');
    }


    public function show(Kort $kort)
    {
        return  view('admin.kort.show');
    }
    
    public function edit(Kort $kort)
    {
        return  view('admin.kort.edit',compact('kort'));
    }


    public function update(KortValidation $request, Kort $kort)
    {
        $kort->update($request->all());
        Session::flash('success','işlem başarile gerçekleştirilmiştir');
        return redirect()->route('kort.index');
    }

   
    public function delete(Kort $kort)
    {
        return view('admin.kort.delete',compact('kort'));
	}
	public function p_delete( Kort $kort)
    {
		$kort->durum=9;
		$kort->save();
		Session::flash('success',$kort->isim.' kort belgileri basarile silindi');        
		return redirect()->route('kort.index');
	}
	public function restore(Kort $kort)
    {
        return view('admin.kort.delete',compact('kort'));
	}
	public function p_restore(Kort $kort)
    {
		$kort->durum=0;
		$kort->save();
		Session::flash('success',$kort->isim.' kort belgileri basarile silindi');        
		return redirect()->route('kort.index');
    }
    public function destroy(Kort $kort)
    {
        $isim=$kort->isim;
        $kort->delete($kort);
        Session::flash('success',$isim.' kort belgileri basarile silinmiş');        
        return back();
    }
    
}
