<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StageValidation;
use App\Models\Stage;
use Session;

class StageController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $stages = Stage::allList();
        return view('admin.stage.index', compact('stages'));
    }

    public function allDeleted()
    {
        $stages = Stage::allDeleted();
        return view('admin.stage.index', compact('stages'));
    }

    public function fix(Stage $stage)
    {
        $stage->status = 2;
        $stage->save();
        return back();
    }

    public function busy(Stage $stage)
    {
        $stage->status = 1;
        $stage->save();
        return back();
    }

    public function run(Stage $stage)
    {
        $stage->status = 0;
        $stage->save();
        return back();
    }

    public function create()
    {
        return view('admin.stage.create');
    }


    public function store(StageValidation $request)
    {
        $stage = new Stage;
        $stage->fill($request->all());
        $stage->save();
        return redirect()->route('stage.index');
    }


    public function show(Stage $stage)
    {
        return view('admin.stage.show');
    }

    public function edit(Stage $stage)
    {
        return view('admin.stage.edit', compact('stage'));
    }


    public function update(StageValidation $request, Stage $stage)
    {
        $stage->update($request->all());
        Session::flash('success', 'işlem başarile gerçekleştirilmiştir');
        return redirect()->route('stage.index');
    }


    public function delete(Stage $stage)
    {
        return view('admin.stage.delete', compact('stage'));
    }

    public function p_delete(Stage $stage)
    {
        $stage->status = 9;
        $stage->save();
        Session::flash('success', $stage->name.' stage belgileri basarile silindi');
        return redirect()->route('stage.index');
    }

    public function restore(Stage $stage)
    {
        return view('admin.stage.delete', compact('stage'));
    }

    public function p_restore(Stage $stage)
    {
        $stage->status = 0;
        $stage->save();
        Session::flash('success', $stage->name.' stage belgileri basarile silindi');
        return redirect()->route('stage.index');
    }

    public function destroy(Stage $stage)
    {
        $name = $stage->name;
        $stage->delete($stage);
        Session::flash('success', $name.' stage belgileri basarile silinmiş');
        return back();
    }

}
