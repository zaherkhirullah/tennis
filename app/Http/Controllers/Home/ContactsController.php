<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;
use Session;
class ContactsController extends Controller
{
    
    public function create()
    {
        return view('home.contacts');
    }

    public function store(ContactsValidation $request)
    {
        $contact = new Contacts;
        $contact->fill($request->all());
        $contact->save();
        Session::flash('success','Sayın '.$contact->isim .' iletişim talebiniz başarile gönderilmiştir.') ;
        return redirect()->back(); 
    }   
}
