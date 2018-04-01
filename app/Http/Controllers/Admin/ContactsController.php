<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;

class ContactsController extends Controller
{
  
    public function index()
    {
        $contact = new Contacts;
        $contacts = $contact->AllContacts()->get();
        return view('admin.contacts.index',compact('contacts'));
    }
    public function silindi()
    {
        $contact = new Contacts;
        $contacts = $contact->AllDeletedContacts()->get();
        return view('admin.contacts.index',compact('contacts'));
    }

    public function show(Contatcs $contatcs)
    {
        //
    }
    public function create()
    {
        return view('admin.contacts.create');
    }

    public function edit(Contatcs $contatcs)
    {
        //
    }

    public function update(ContactsValidation $request, Contatcs $contatcs)
    {
        //
    }

    public function destroy(Contatcs $contatcs)
    {
        //
    }

   
}
