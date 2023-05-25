<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactsValidation;
use App\Models\Contacts;
use Session;

class ContactsController extends Controller
{

    // contacts page
    public function create()
    {
        return view('home.contacts');
    }

    public function store(ContactsValidation $request)
    {
        $contact = new Contacts;
        $contact->fill($request->all());
        $contact->save();
        Session::flash('success', 'Sayın '.$contact->name.' iletişim talebiniz başarile gönderilmiştir.');
        return redirect()->back();
    }
}
