<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Area;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderBy('id', 'desc')->get();
        // dd($areas);
        return view('admin.area.index', compact('areas'));
    }

    public function AreaData()
    {

        $query = Area::query();
        return  DataTables::of($query)
            ->addColumn('record_select', 'admin.area.data_table.record_select')
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->addColumn('proivnce_count', function ($area) {
                return view('admin.area.data_table.province', compact('area'));
            })
            // province

            ->addColumn('subarea_count', function ($area) {
                return view('admin.area.data_table.subarea', compact('area'));
            })
            ->editColumn('created_at', function ($area) {
                return $area->created_at->format('Y-m-d');
            })
            ->editColumn('status', function ($area) {
                return $area->getStatusWithSpan();
            })
            // ->addColumn('actions', 'bank.data_table.actions')
            ->addColumn('actions', function ($area) {
                return view('admin.area.data_table.actions', compact('area'));
            })
            ->rawColumns(['record_select', 'proivnce_count', 'subarea_count',  'actions', 'realstate_count',  'status', 'roles', 'service', 'type', 'area'])
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
        // return $request;
        try {
            // dd($request);
            $request->validate(['name' => 'required']);
            Area::create($request->except('_token'));
            session()->flash('success', __('translation.1'));
            return redirect()->back();
        } catch (Exception $e) {
            // dd($e);
            session()->flash('error', 'some Thing Went Worng');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        try {
            // dd($area);
            $data = $request->validate([
                'name' => 'required',
            ]);

            $area = $area->update($data);
            session()->flash('success',  __('translation.2'));
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        try {
            $area->delete();
            session()->flash('sccuess',  'Item Was Update Success Fuly');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error',  'Some Thing Went Worng');
            return redirect()->back();
        }
    }

    public function Ajax()
    {

        $search = request()->search;


        $employees = Area::when($search, function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
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
}
