<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Repo\Interfaces\ClientInteface;
use App\Traits\HasSelect2Ajax;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

// abstract class
abstract class ClientControllerAbstract extends Controller
{

    use HasSelect2Ajax;
}
class ClientController extends ClientControllerAbstract
{
    public $Model = Client::class;
    public $interface; # the InterFace Used In This Controller

    public function __construct(ClientInteface $interface)
    {
        // dd('ok');
        $this->interface = $interface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return $this->interface->getClientIndex();
    }



    public function  ClientData()
    {

        $query = Client::with('Nationalaity');
        return  DataTables::of($query)
            ->addColumn('record_select', 'admin.clients.data_table.record_select')
            // ->addColumn('properties', fn ($owner) => view('admin.owners.data_table.realstates', compact('owner')))
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->addColumn('nationalaity', function ($client) {
                return  $client->Nationalaity->name ?? '';
            })
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->editColumn('status', function ($area) {
                return $area->getStatusWithSpan();
            })

            ->editColumn('id_type', function ($client) {
                return __('translation.' . $client->id_type);
            })
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($owner) {
                return view('admin.clients.data_table.actions', compact('owner'));
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
        return $this->interface->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        // return $request;
        return $this->interface->StoreClient($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        if (request()->has('status')) return $this->interface->ChangeStatus($client);

        return view('admin.clients.show', compact('client'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return $this->interface->editClient($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        // return $request;
        return $this->interface->updateClient($request, $client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        return $this->interface->deleteClient($client);
    }
}
