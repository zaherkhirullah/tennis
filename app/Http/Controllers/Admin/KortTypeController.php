<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Models\KortType;
use Illuminate\Http\Request;

class KortTypeController extends Controller
{
    public function index()
    {
       $kortType = new KortType;
       $kortTypeler =$kortType->AllKortTypes()->get();
        return view('admin.kortType.index',compact('kortTypeler'));
    }
    public function silindi()
    {
       $kortType = new KortType;
       $kortTypeler =$kortType->AllDeletedKortTypes()->get();
        return view('admin.kortType.index',compact('kortTypeler'));
    }
    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KortType  $kortType
     * @return \Illuminate\Http\Response
     */
    public function show(KortType $kortType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KortType  $kortType
     * @return \Illuminate\Http\Response
     */
    public function edit(KortType $kortType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KortType  $kortType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KortType $kortType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KortType  $kortType
     * @return \Illuminate\Http\Response
     */
    public function destroy(KortType $kortType)
    {
        //
    }
}
