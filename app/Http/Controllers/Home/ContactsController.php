<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use App\Http\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;

class ContactsController extends Controller
{
    
    public function create()
    {
        return view('home.contacts');
    }

    public function store(ContactsValidation $request)
    {
        //
    }

   
}
