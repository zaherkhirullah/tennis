<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;
use Session;
class ContactsController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth','admin']);
    }
    public function index(Contacts $contacts)
    {
        $contacts = Contacts::all_list();
        return view('admin.contacts.index',compact('contacts'));
    }
    public function all_deleted()
    {
        $contacts = Contacts::all_deleted();
        return view('admin.contacts.index',compact('contacts'));
    }

    public function show(Contacts $contacts)
    {
        return  view('admin.contact.show',compact('contacts'));
    }
    public function create()
    {
        return view('admin.contacts.create');
    }

    public function edit(Contacts $contacts)
    {
        return  view('admin.contact.edit',compact('contacts'));        
    }

    public function update(ContactsValidation $request, Contacts $contacts)
    {
        
        Session:flash('success','başarile işlem gncellenmiştir');
        return redirect()->route('Acontatcs.index');
    }

    public function destroy(Contacts $contacts)
    {
        
    }

   
}
