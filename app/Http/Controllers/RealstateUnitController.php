<?php

namespace App\Http\Controllers;

use App\Models\RealstateUnit;
use Illuminate\Http\Request;

class RealstateUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('realstateunit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealstateUnit  $realstateUnit
     * @return \Illuminate\Http\Response
     */
    public function show(RealstateUnit $realstateUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealstateUnit  $realstateUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(RealstateUnit $realstateUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RealstateUnit  $realstateUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealstateUnit $realstateUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealstateUnit  $realstateUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealstateUnit $realstateUnit)
    {
        //
    }
}
