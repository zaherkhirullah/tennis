<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RenterValidation;
use App\Models\Renter;
use Session;

class RenterController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $Kiralayanlar = Renter::allList();
        return view('admin.renter.index', compact('Kiralayanlar'));
    }

    public function allDeleted()
    {
        $Kiralayanlar = Renter::allDeleted();
        return view('admin.renter.index', compact('Kiralayanlar'));
    }

    public function create()
    {
        return view('admin.renter.create');
    }

    public function store(RenterValidation $request)
    {
        $renter = new Renter;
        $renter->fill($request->all());
        $renter->save();
        return redirect()->route('renter.index');
    }

    public function show(Renter $renter)
    {
        return view('admin.renter.show', compact('renter'));
    }

    public function edit(Renter $renter)
    {
        return view('admin.renter.edit', compact('renter'));
    }

    public function update(RenterValidation $request, Renter $renter)
    {
        $renter->update($request->all());
        Session::flash('success', $renter->name.' renter belgileri basarile güncellendi');
        return back();
    }

    public function delete(Renter $renter)
    {
        return view('admin.renter.delete', compact('renter'));
    }

    public function destroy(Renter $renter)
    {
        $name = $renter->name;
        $renter->delete($renter);
        Session::flash('success', $name.' renter belgileri basarile silinmiş');
        return back();
    }
}
