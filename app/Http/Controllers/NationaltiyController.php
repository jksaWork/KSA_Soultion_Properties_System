<?php

namespace App\Http\Controllers;

use App\Models\Nationaltiy;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NationaltiyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nationaltiy.index');
    }


    public function NationnaltyData()
    {
        $query =  Nationaltiy::query();
        return  DataTables::of($query)
            ->addColumn('record_select', 'bank.data_table.record_select')
            ->editColumn('created_at', function ($bank) {
                return $bank->created_at->format('Y-m-d');
            })
            ->editColumn('status', function ($bank) {
                return $bank->getStatusWithSpan();
            })
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($bank) {
                return view('nationaltiy.data_table.actions', compact('bank'));
            })
            ->rawColumns(['record_select', 'actions', 'status', 'roles', 'service', 'type', 'area'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd('asd');
            $data = $request->validate([
                'name' => 'required',
            ]);

            $bank = Nationaltiy::create($data);
            session()->flash('success',  __('translation.1'));
            return redirect()->back();
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nationaltiy  $nationaltiy
     * @return \Illuminate\Http\Response
     */
    public function show($nationaltiy_id)
    {

        // $nationaltiy->ChangeStatus()
        Nationaltiy::find($nationaltiy_id)->ChangeStatus();
        // return redirect()->back();
        if (!request()->ajax()) return redirect()->back();
        return  response()->json(['sccuess' => true], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nationaltiy  $nationaltiy
     * @return \Illuminate\Http\Response
     */
    public function edit(Nationaltiy $nationaltiy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nationaltiy  $nationaltiy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $nationaltiy_id)
    {
        // dd($nationaltiy_id);
        try {
            // dd('asd');
            $data = $request->validate([
                'name' => 'required',
            ]);

            $Nationaltiy = Nationaltiy::find($nationaltiy_id);
            $Nationaltiy->update($data);
            session()->flash('success',  __('translation.2'));
            return redirect()->back();
        } catch (\Throwable $th) {
            // dd()
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nationaltiy  $nationaltiy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nationaltiy $nationaltiy)
    {
        //
    }
}