<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;

class ContactsController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin');
    }
    public function index(Contacts $contacts)
    {
        $contact = new Contacts;
        $contacts = $contact->AllContacts();
        return view('admin.contacts.index',compact('contacts'));
    }
    public function silindi()
    {
        $contact = new Contacts;
        $contacts = $contact->AllDeletedContacts();
        return view('admin.contacts.index',compact('contacts'));
    }

    public function show(Contacts $contacts)
    {
        
    }
    public function create()
    {
        return view('admin.contacts.create');
    }

    public function edit(Contacts $contacts)
    {
        
    }

    public function update(ContactsValidation $request, Contacts $contacts)
    {
        
    }

    public function destroy(Contacts $contacts)
    {
        
    }

   
}
