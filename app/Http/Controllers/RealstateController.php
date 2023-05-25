<?php

namespace App\Http\Controllers;

use App\Http\Requests\RealstateRequest;
use App\Models\Attachments;
use App\Models\Realstate;
use App\Traits\HasSelect2Ajax;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

abstract class RealstateControllerAbstract extends Controller
{

    use HasSelect2Ajax;
}
class RealstateController extends RealstateControllerAbstract
{
    public $Model = Realstate::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('realstates.index');
    }

    public function RealstateData()
    {
        $query = Realstate::with(['Unit', 'SubArea', 'Province']);

        return  DataTables::of($query)
            ->addColumn('record_select', 'admin.owners.data_table.record_select')
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->addColumn('province', function ($owner) {
                return $owner->Province->name ?? '';
            })
            ->addColumn('subarea', function ($owner) {
                return $owner->SubArea->name ?? ' ';
            })
            ->addColumn('opration_precentage', function ($owner) {
                return '10%';
            })
            ->addColumn('realstate_units', function ($realstate) {
                return view('realstates.data_table.units', compact('realstate'));
            })
            ->addColumn('unit', function ($owner) {
                return $owner->Unit->name ?? '';
            })
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->editColumn('status', function ($area) {
                return $area->getStatusWithSpan();
            })
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($realstate) {
                return view('realstates.data_table.action', compact('realstate'));
            })
            ->rawColumns(['record_select', "realstate_units",   'actions', 'properties', 'realstate_count',  'status', 'roles', 'service', 'type', 'area'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('realstates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RealstateRequest $request)
    {
        try {
            $data =  $request->except('attachments', '_token');
            $realstate =   Realstate::create($data);
            Attachments::AttachMUltiFIleFiles($request->attachments, $realstate, 'realstates/attachemnts');
            session()->flash('success',  __('translation.1'));
            return redirect()->route('realstate.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Realstate  $realstate
     * @return \Illuminate\Http\Response
     */
    public function show(Realstate $realstate)
    {
        if (request()->has('status')) {
            return $this->Handelstatus($realstate);
        }
        $realState  = $realstate;
        return view('realstates.show', compact('realstate', 'realState'));
    }

    public function Handelstatus(Realstate $realstate)
    {
        try {
            $realstate->ChangeStatus();
            session()->flash('success',  __('translation.1'));
            if (request()->ajax()) return  response()->json(['message' => 'Success Full'], 200, $headers);
            return redirect()->route('realstate.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Realstate  $realstate
     * @return \Illuminate\Http\Response
     */
    public function edit(Realstate $realstate)
    {
        return view('realstates.edit', compact('realstate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Realstate  $realstate
     * @return \Illuminate\Http\Response
     */
    public function update(RealstateRequest $request, Realstate $realstate)
    {
        // return $request;
        try {
            $data =  $request->except('attachments', '_token');
            $realstate =   $realstate->update($data);
            // Attachments::AttachMUltiFIleFiles($request->attachments, $realstate, 'realstates/attachemnts');
            session()->flash('success',  __('translation.2'));
            return redirect()->route('realstate.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realstate  $realstate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Realstate $realstate)
    {
        //
    }
}
