<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use App\Traits\FileUploaDTrait;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class AdminController extends Controller
{
    use FileUploaDTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin', 'super_admin', 'user'])->get();
        return view('admin.admins.index', compact('roles'));
    }


    public function data()
    {
        $query = Admin::whenHasRole(request()->role_id);

        return  FacadesDataTables::of($query)
            ->addColumn('record_select', 'admin.admins.data_table.record_select')
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.admins.data_table.actions')
            ->addColumn('roles', function (User $admin) {
                return view('admin.admins.data_table.roles', compact('admin'));
            })
            ->rawColumns(['record_select', 'actions', 'roles'])
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('name', ['admin', 'super_admin'])->get();
        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(AdminRequest $request)
    {
        $requestData = $request->validated();
        // dd($requestData);
        try {
            $profile_image =  $this->upload($request->profile_image, 'admins/profiles');
            $id_image =  $this->upload($request->id_image, 'admins/identification');

            $requestData['password'] = bcrypt($request->password);
            $requestData['id_image'] =  $id_image;
            $requestData['image'] = $profile_image;
            // dd($requestData);
            $admin = Admin::create($requestData);
            $admin->attachRoles(['admin', $request->role_id]);
            session()->flash('success', __('translation.1'));
            return Redirect()->route('admin.admin.index');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        try {
            if (request()->has('status')) {
                $admin->ChangeStatus();
                session()->flash('success', __('translation.3'));
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withErrors(__('translation.1'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::whereNotIn('name', ['super_admin', 'user'])->get();
        $admin = Admin::find($id);
        return view('admin.admins.edit', compact('roles', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        // return $request;

        try {
            $admin = Admin::find($id);
            // $this->upload();
            $profile_image =  $this->upload($request->profile_image, 'admins/profiles');
            $id_image =  $this->upload($request->id_image, 'admins/identification');

            $requestData['password'] = bcrypt($request->password);
            $requestData['id_image'] =  $id_image;
            $requestData['image'] = $profile_image;
            // dd($requestData);
            $admin->update($requestData);
            $admin->syncRoles(['admin', $request->role_idd]);
            session()->flash('success', __('translation.2'));
            return Redirect()->route('admin.admin.index');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->withErrors(__('translation.6'));
        }
    }

    public function destroy(User $admin)
    {
        $this->delete($admin);
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.admin.index');
    } // end of destroy



    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $admin = User::FindOrFail($recordId);
            $this->delete($admin);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(User $admin)
    {
        $admin->delete();
    } // end of delete

}
