<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
// use Yajra\Datatables\Facades\Datatables;
// use Yajra\DataTables\DataTables;
// use Yajra\Datatables\Datatables;
// use Yajra\DataTables\DataTables;
use DataTables;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:read_roles')->only(['index']);
        // $this->middleware('permission:create_roles')->only(['create', 'store']);
        // $this->middleware('permission:update_roles')->only(['edit', 'update']);
        // $this->middleware('permission:delete_roles')->only(['delete', 'bulk_delete']);

    } // end of __construct

    public function index()
    {
        // dd(Role::all());
        $roles = Role::whereNotIn('name', ['super_admin', 'admin'])
            ->withCount(['users'])->get();
        return view('admin.roles.index', compact('roles'));
    } // end of index

    public function data()
    {
        $roles = Role::whereNotIn('name', ['super_admin', 'admin', 'user'])
            ->withCount(['users']);

        return  DataTables::of($roles)
            ->addColumn('record_select', 'admin.roles.data_table.record_select')
            ->editColumn('created_at', function (Role $role) {
                return $role->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.roles.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->toJson();
    } // end of data

    public function create()
    {
        return view('admin.roles.create');
    } // end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);
        // dd('Hello');
        try {
            $role = Role::create($request->only(['name']));
            $role->attachPermissions($request->permissions);
            session()->flash('success', __('translation.1'));
            return redirect()->to('admin/roles');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors(__('translation.6'));
        }
    } // end of store

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    } // end of edit

    public function update(Request $request, Role $role)
    {
        $role->update($request->only(['name']));
        $role->syncPermissions($request->permissions);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.roles.index');
    } // end of update

    public function destroy(Role $role)
    {
        $this->delete($role);
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->back();
    } // end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $role = Role::FindOrFail($recordId);
            $this->delete($role);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Role $role)
    {
        $role->delete();
    } // end of delete

}
