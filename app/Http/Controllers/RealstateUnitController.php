<?php

namespace App\Http\Controllers;

use App\Http\Requests\RealStateUnitRequest;
use App\Models\Realstate;
use App\Models\RealstateUnit;
use App\Traits\HasSelect2Ajax;
use Illuminate\Http\Request;

abstract class RealstateUnitControllerAbstarct  extends Controller
{
    use HasSelect2Ajax;
}
class RealstateUnitController extends RealstateUnitControllerAbstarct
{
    public $Model = RealstateUnit::class;
    public $searchFilable =
    [
        'realstate_id' => [
            'filed' => 'realstate_id',
            'oprator' => '=',
        ]
    ];

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
        $floors = [];
        for ($i = 0; $i < 10; $i++) {
            $floors[$i] = $i + 1 . '_floor';
        }
        return view('realstateunit.create', compact('floors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RealStateUnitRequest $request)
    {
        // return $request;
        // return $this->request()
        try {
            $data =  $request->except('_token');
            RealstateUnit::create($data);
            return redirect()->route('realstate.show', $request->realstate_id);
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->withErrors(__('translation.6'));
        }
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
    public function edit($realstateUnit_id)
    {
        $realstateUnit  = RealstateUnit::with('Unit')->find($realstateUnit_id);
        // dd($realstateUnit);
        return view('realstateunit.edit', compact('realstateUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RealstateUnit  $realstateUnit
     * @return \Illuminate\Http\Response
     */
    public function update(RealStateUnitRequest $request, $id)
    {

        try {
            $realstateUnit = RealstateUnit::find($id);
            $data =  $request->except('_token');
            $realstateUnit->update($data);
            return redirect()->route('realstate.show', $request->realstate_id);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
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
