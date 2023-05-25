<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceValidation;
use App\Models\Service;
use Session;

class ServisController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $services = Service::allList();
        return view('admin.Service.index', compact('services'));
    }

    public function allDeleted()
    {
        $services = Service::allDeleted();
        return view('admin.Service.index', compact('services'));
    }

    public function fix(Service $servi)
    {
        $servi->status = 2;
        $servi->save();
        return redirect()->back();
    }

    public function busy(Service $servi)
    {
        $servi->status = 1;
        $servi->save();
        return redirect()->back();
    }

    public function run(Service $servi)
    {
        $servi->status = 0;
        $servi->save();
        return redirect()->back();
    }

    public function list_reservation(Service $servi)
    {

    }

    public function create()
    {
        return view('admin.Service.create');
    }

    public function store(ServiceValidation $request)
    {
        $servi = new Service;
        $servi->name = 'Servis '.str_random(2);
        $servi->fill($request->all());
        $servi->save();
        Session::flash('success', 'yeni Service basarile oluşturuldu');
        return redirect()->route('Service.index');
    }

    public function show(Service $servi)
    {
        return view('admin.Service.show', compact('service'));

    }

    public function edit(Service $servi)
    {
        return view('admin.Service.edit', compact('service'));
    }

    public function update(ServiceValidation $request, Service $servi)
    {
        $servi->update($request->all());
        Session::flash('success', $servi->name.' Service belgileri basarile güncellendi');
        return redirect()->route('Service.index');
    }

    public function delete(Service $servi)
    {
        return view('admin.Service.delete', compact('service'));
    }

    public function p_delete(Service $servi)
    {
        $servi->status = 9;
        $servi->save();
        Session::flash('success', $servi->name.' Service belgileri basarile silindi');
        return redirect()->route('Service.index');
    }

    public function restore(Service $servi)
    {
        return view('admin.service.delete', compact('service'));
    }

    public function p_restore(Service $servi)
    {
        $servi->status = 0;
        $servi->save();
        Session::flash('success', $servi->name.' service belgileri basarile silindi');
        return redirect()->route('service.index');
    }

    public function destroy(Service $servi)
    {
        $name = $servi->name;
        $servi->delete($servi);
        Session::flash('success', $name.' service belgileri basarile silinmiş');
        return redirect()->route('service.index');
    }
}
