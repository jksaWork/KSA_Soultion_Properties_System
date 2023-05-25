<?php

namespace App\Http\Controllers;

use App\Http\Requests\AchivementRequest;
use App\Models\Achivement;
use App\Models\Attachments;
use App\Models\Contract;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AchivementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return   view('admin.achivements.index');
    }


    public  function Contracts()
    {
        return view('admin.achivements.contracts');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type =  new class
        {
            public $name;
            public function __construct()
            {
                $this->name = __('translation.' . request()->type);
            }
        };
        // dd($jksa, request()->type);
        $contract = Contract::findOrFail(request()->contracts);
        return view('admin.achivements.create', compact('contract', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AchivementRequest $request)
    {
        // return $request;
        $contract = Contract::findOrFail($request->contract_id);
        $data = [
            'amount' => $request->amount,
            'type' => $request->type_id,
            'payment_date' => $request->payment_date ?? date('y-m-d'),
            // 'contract' => $request->contract_id,
            'note' => $request->note,
            'realstate_id' => $request->client_id,
            'client_id' => $request->client_id,
            'contract_id' => $request->contract_id,
            // 'realstate_unit_id' => $contract->rea
        ];
        $achivements = Achivement::create($data);
        Attachments::AttachMUltiFIleFiles($request->attachments, $achivements, 'clients/attachment');

        return  redirect()->route('achivement.index');
    }


    public function  AchivementsData()
    {

        $query = Achivement::with(['Client', 'Realstate']);
        return  DataTables::of($query)
            ->addColumn('record_select', 'admin.clients.data_table.record_select')
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->addColumn('realstate', function ($client) {
                return  $client->Realstate->name ?? '';
            })
            ->addColumn('contracts', function ($achive) {
                $realstate = $achive->Contract;
                $type = 'contract';
                return view('realstates.data_table.units', compact('realstate', 'type'));
            })
            ->addColumn('contract_number', function ($achive) {
                return $achive->Contract->contract_number;
            })
            ->addColumn('client', function ($area) {
                return $area->Client->name ?? '-';
            })
            ->editColumn('type', fn ($achive) => __('translation.' . $achive->type))
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($contract) {
                return view('admin.contracts.data_table.actions', compact('contract'));
            })
            ->addColumn('achivements_actions', function ($contract) {
                return view('admin.achivements.data_table.achivements_actions', compact('contract'));
            })
            ->rawColumns(['record_select', 'actions', 'properties', 'realstate_count',  'status', 'roles', 'service', 'type', 'area'])
            ->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function show(Achivement $achivement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function edit(Achivement $achivement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achivement $achivement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achivement $achivement)
    {
        //
    }
}
