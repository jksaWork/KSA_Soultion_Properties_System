<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Models\Attachments;
use App\Models\Contract;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contracts.index');
    }


    public function ContractsData()
    {

        $query = Contract::with(['Client', 'Realstate']);
        return  DataTables::of($query)
            ->addColumn('record_select', 'admin.clients.data_table.record_select')
            // ->addColumn('properties', fn ($owner) => view('admin.owners.data_table.realstates', compact('owner')))
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->addColumn('realstate', function ($client) {
                return  $client->Realstate->name ?? '';
            })
            ->addColumn('contracts', function ($contract) {
                $realstate = $contract;
                $type = 'contract';
                return view('realstates.data_table.units', compact('realstate', 'type'));
            })
            ->addColumn('client', function ($area) {
                return $area->Client->name ?? '-';
            })
            ->editColumn('payment_way', fn ($contract) => __('translation.' . $contract->payment_way))

            ->editColumn('id_type', function ($contract) {
                return __('translation.' . $contract->id_type);
            })
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($contract) {
                return view('admin.contracts.data_table.actions', compact('contract'));
            })
            ->addColumn('achivements_actions', function ($contract) {
                return view('admin.achivements.data_table.achivements_actions', compact('contract'));
            })
            ->editColumn('status', function ($bank) {
                return $bank->getStatusWithSpan();
            })
            ->rawColumns(['record_select', 'actions', 'properties', 'realstate_count',  'status', 'roles', 'service', 'type', 'area'])
            ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {
        try {

            $data =  $request->except('_token', 'attachments');
            $contract  = Contract::create($data);
            Attachments::AttachMUltiFIleFiles($request->attachments, $contract, 'contract/attachments');
            session()->flash('success',  __('translation.1'));
            return redirect()->route('contracts.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }


    public function syncUnit(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'realstatee_unit_id' => 'required',
        ]);
        try {
            $contract  = Contract::find($id);
            $contract->RealStateUnits()->sync($request->realstatee_unit_id);
            session()->flash('sccuess', __('translation.4'));
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        if (request()->has('status')) return $this->HandelStatus($contract);
        // return 'Hello';
        return view('admin.contracts.show', compact('contract'));
    }

    public function HandelStatus($contract)
    {

        $contract->ChangeStatus();
        // return redirect()->back();
        if (!request()->ajax()) return redirect()->back();
        return  response()->json(['sccuess' => true], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        return view('admin.contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(ContractRequest $request, Contract $contract)
    {
        try {

            $data =  $request->except('_method', '_token');
            $contract->update($data);
            session()->flash('success',  __('translation.2'));
            return redirect()->route('contracts.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
