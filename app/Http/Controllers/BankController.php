<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bank.index');
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

            $bank = Bank::create($data);
            session()->flash('success',  __('translation.1'));
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        // dd($bank);
        $bank->ChangeStatus();
        // return redirect()->back();
        if (!request()->ajax()) return redirect()->back();
        return  response()->json(['sccuess' => true], 200);
    }

    public function BanksData()
    {
        $query = Maintenance::query();
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
                return view('bank.data_table.actions', compact('bank'));
            })
            ->rawColumns(['record_select', 'actions', 'status', 'roles', 'service', 'type', 'area'])
            ->toJson();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        // return $bank;
        try {
            // dd('asd');
            $data = $request->validate([
                'name' => 'required',
            ]);

            $bank = $bank->update($data);
            session()->flash('success',  __('translation.2'));
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }


    public function Ajax()
    {

        $search = request()->search;

        $employees = Bank::when($search, function ($q) use ($search) {
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
