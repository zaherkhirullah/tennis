<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Contatcs;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsValidation;

class ContatcsController extends Controller
{
  
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function store(ContactsValidation $request)
    {
        //
    }

    public function show(Contatcs $contatcs)
    {
        //
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
