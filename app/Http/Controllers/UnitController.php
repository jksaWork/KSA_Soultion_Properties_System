<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Traits\HasSelect2Ajax;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

abstract class UnitControllerAbstarct extends Controller
{
    use HasSelect2Ajax;
}
class UnitController extends UnitControllerAbstarct
{
    public $Model = Unit::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('units.index');
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

    public function UnitData()
    {
        $query = Unit::query();
        // dd($query->get());
        return  DataTables::of($query)
            ->addColumn('record_select', 'units.data_table.record_select')
            ->editColumn('created_at', function ($bank) {
                return $bank->created_at->format('Y-m-d');
            })
            ->addColumn('realstate_count', function ($bank) {
                return '<span class="btn btn-sm btn-info">(12)العقارات</span>';
            })
            ->editColumn('created_at', function ($bank) {
                return $bank->created_at->format('Y-m-d');
            })
            ->editColumn('status', function ($bank) {
                return $bank->getStatusWithSpan();
            })
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($bank) {
                return view('units.data_table.actions', compact('bank'));
            })
            ->rawColumns(['record_select', 'actions', 'realstate_count',  'status', 'roles', 'service', 'type', 'area'])
            ->toJson();
    }

    public function store(Request $request)
    {
        try {
            // dd('asd');
            $data = $request->validate([
                'name' => 'required',
            ]);

            $bank = Unit::create($data);
            session()->flash('success',  __('translation.2'));
            return redirect()->back();
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        // dd($bank);
        $unit->ChangeStatus();
        if (!request()->ajax()) return redirect()->back();
        return  response()->json(['sccuess' => true], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        try {
            // dd('asd');
            $data = $request->validate([
                'name' => 'required',
            ]);

            $unit = $unit->update($data);
            session()->flash('success',  __('translation.2'));
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
