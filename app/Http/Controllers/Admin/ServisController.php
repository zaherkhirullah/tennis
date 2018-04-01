<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\Servis;
use Illuminate\Http\Request;
use App\Http\Requests\ServisValidation;

class ServisController extends Controller
{
    public function index()
    {
        $servis = new Servis;
        $servisler = $servis->AllServisler()->get();
        return view('admin.servis.index',compact('servisler'));
    }
    public function silindi()
    {
        $servis = new Servis;
        $servisler = $servis->AllDeletedServisler()->get();
        return view('admin.servis.index',compact('servisler'));
    }
    public function create()
    {
        //
    }

    public function store(ServisValidation $request)
    {
        //
    }

    public function show(Servis $servis)
    {
        //
    }

    public function edit(Servis $servis)
    {
        //
    }

    public function update(ServisValidation $request, Servis $servis)
    {
        //
    }

    public function destroy(Servis $servis)
    {
        //
    }
}
