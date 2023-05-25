<?php

namespace App\Http\Controllers;

use App\Models\SubArea;
use App\Traits\HasSelect2Ajax;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

abstract class OfferASubAreaControllerAbstract extends Controller
{
    // use HasFactory, HasStatus, SoftDeletes;
    use HasSelect2Ajax;
    protected $guarded = [];
}

class SubAreaController extends OfferASubAreaControllerAbstract
{
    public $Model = SubArea::class;
    public $searchFilable =
    [
        'area_id' => [
            'filed' => 'area_id',
            'oprator' => '=',
        ],
        'province_id' => [
            'filed' => 'province_id',
            'oprator' => '=',
        ],

    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subarea.index');
    }


    public function SubAreaData()
    {
        $query = SubArea::query();
        return  DataTables::of($query)
            ->addColumn('record_select', 'admin.subarea.data_table.record_select')
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->addColumn('area', function ($subarea) {
                return $subarea->Area->name;
            })
            ->addColumn('province', function ($subarea) {
                return $subarea->Province->name;
            })

            ->addColumn('realstate_count', function ($owner) {
                // return '<span class="btn btn-sm btn-info">(12)العقارات</span>';
                return view('admin.owners.data_table.realstates', compact('owner'));
            })
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->editColumn('status', function ($area) {
                return $area->getStatusWithSpan();
            })
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($subarea) {
                return view('admin.subarea.data_table.actions', compact('subarea'));
            })
            ->rawColumns(['record_select', 'actions', 'realstate_count',  'status', 'roles', 'service', 'type', 'area'])
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
            $data =  $request->validate([
                'area_id' => 'required',
                'province_id' => 'required',
                'name' => 'required',
            ]);

            $subarea  = SubArea::create($data);
            session()->flash('success',  __('translation.1'));
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubArea  $subArea
     * @return \Illuminate\Http\Response
     */
    public function show($sub_area_id)
    {
        // dd('saddsa');
        $subArea = SubArea::find($sub_area_id);
        $subArea->ChangeStatus();
        // dd('done');
        // return redirect()->back();
        if (!request()->ajax()) return redirect()->back();
        return  response()->json(['sccuess' => true], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubArea  $subArea
     * @return \Illuminate\Http\Response
     */
    public function edit(SubArea $subArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubArea  $subArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubArea $subArea)
    {
        $data =  $request->validate([
            'area_id' => 'required',
            'name' => 'required',
            'province_id' => 'required',
            'subarea_id' => 'required',
        ]);
        try {
            $Province  = SubArea::find($request->subarea_id)->update($data);
            session()->flash('success',  __('translation.2'));
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubArea  $subArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubArea $subArea)
    {
        //
    }
}
