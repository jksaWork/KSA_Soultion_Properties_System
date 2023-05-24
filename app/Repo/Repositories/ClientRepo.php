<?php

namespace App\Repo\Repositories;

use App\Models\Attachments;
use App\Models\Client;
use App\Repo\Interfaces\ClientInteface;
use Exception;
use DB;

class  ClientRepo  implements ClientInteface
{
    public function create()
    {
        return view('admin.clients.create');
    }
    public function StoreClient($request)
    {
        try {
            DB::beginTransaction();
            $cleint =  $this->StoreClientInDatabse($request);
            // dd();

            if ($request->attachments) {
                // dd('Hello');
                Attachments::AttachMUltiFIleFiles($request->attachments, $cleint, 'clients/attachment');
            }
            // dd('Attachments Done');
            // return $this->getClientIndex();
            DB::commit();

            return redirect()->route('clients.index');
        } catch (\Throwable $th) {
            DB::rollback();

            throw $th;
        }
    }


    public function StoreClientInDatabse($request)
    {
        try {
            $data = $request->except('attachments', '_token');
            // $data['password'] = bcrypt($request->password);
            return  Client::create($data);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getClientIndex()
    {
        $clients = Client::whenSerach()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }


    public function ChangeStatus($client)
    {
        // Change The Status
        $client->ChangeStatus();
        return redirect()->route('clients.index');
    }

    public function editClient($client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function updateClient($request,  $client)
    {
        // dd($request , $client);
        try {
            DB::beginTransaction();
            $data = $request->except('_token', '_method');
            // $data['password'] = bcrypt($request->password);
            $client->update($data);
            session()->flash('success', __('translation.2'));
            return redirect()->route('clients.index');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return $e;
            session()->flash('error',  'Some Thing Went Worng ');
            return redirect()->back();
        }
    }

    public function deleteClient($client)
    {
        try {
            $client->delete();
            session()->flash('success', 'Client Was Delete Succesfuly');
            return redirect()->route('clients.index');
        } catch (Exception $e) {
            session()->flash('error',  'Some Thing Went Worng ');
            return redirect()->back();
        }
    }
}
