<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.province.index');
    }

    public function provinceData()
    {
        $query = Province::query();
        return  DataTablesDataTables::of($query)
            ->addColumn('record_select', 'admin.province.data_table.record_select')
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->addColumn('realstate_count', function ($owner) {
                return view('admin.owners.data_table.realstates', compact('owner'));
            })
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->editColumn('status', function ($area) {
                return $area->getStatusWithSpan();
            })
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($province) {
                return view('admin.province.data_table.actions', compact('province'));
            })
            ->rawColumns(['record_select', 'actions', 'realstate_count',  'status', 'roles', 'service', 'type', 'area'])
            ->toJson();
    }

    public function Ajax()
    {

        $search = request()->search;
        $area_id = request()->area_id;

        $employees = Province::when($search, function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        })->when($area_id, function ($q) use ($area_id) {
            $q->where('area_id',   $area_id);
        })
            ->limit(5)->get();
        //  Return Reponose
        $response = array();
        foreach ($employees as $employee) {
            $response[] = array(
                "id" => $employee->id,
                "text" => $employee->name
            );
        }
        return response()->json($response);
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
            $data =  $request->validate([
                'area_id' => 'required',
                'name' => 'required',
            ]);

            $Province  = Province::create($data);
            session()->flash('success',  __('translation.1'));
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        $province->ChangeStatus();
        // return redirect()->back();
        if (!request()->ajax()) return redirect()->back();
        return  response()->json(['sccuess' => true], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        try {
            $data =  $request->validate([
                'area_id' => 'required',
                'name' => 'required',
                'province_id' => 'required',
            ]);

            $Province  = Province::find($request->province_id)->update($data);
            session()->flash('success',  __('translation.2'));
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //
    }
}
