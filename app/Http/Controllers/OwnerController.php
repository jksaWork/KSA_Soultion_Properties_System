<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnersRequest;
use App\Models\Owner;
use App\Repo\Interfaces\OwnerInterFace;
use App\Traits\HasSelect2Ajax;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

abstract class OwnerControllerAbstract extends Controller
{
    // use HasFactory, HasStatus, SoftDeletes;
    use HasSelect2Ajax;
    protected $guarded = [];
}




class OwnerController extends OwnerControllerAbstract
{
    public $Model = Owner::class;
    public $interface;
    public function __construct(OwnerInterFace  $interface)
    {
        $this->interface = $interface;
        // dd($this->interface);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->interface->getOwnerIndex();
    }


    public function OwnerData()
    {

        $query = Owner::withCount('Realstates');

        return  DataTables::of($query)
            ->addColumn('record_select', 'admin.owners.data_table.record_select')
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->addColumn('properties', function ($owner) {
                return '<span class="btn btn-sm btn-info">(12)العقارات</span>';
            })
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->editColumn('status', function ($area) {
                return $area->getStatusWithSpan();
            })
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($owner) {
                return view('admin.owners.data_table.actions', compact('owner'));
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
    public function store(OwnersRequest $request)
    {
        return $this->interface->StoreOwner($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        if (request()->has('status')) return $this->interface->ChangeStatus($owner);
        return  view('admin.owners.show', compact('owner'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return $this->interface->editOwner($owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        // dd($request->validate());
        // return $request->note;
        return $this->interface->UpdateOwner($request, $owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        return $this->interface->deleteOwner($owner);
    }
}
