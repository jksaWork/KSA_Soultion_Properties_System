<?php

namespace App\Traits;

trait HasSelect2Ajax
{
    public $Model = Bank::class;
    public $searchFilable = [];
    // ['area_id' => [
    //     'filed' => 'area_id',
    //     'oprator' => '=',
    // ]];

    public  function Ajax()
    {
        $search = request()->search;
        $RequestArray = request()->toArray();

        $q = ($this->Model)::query();
        foreach ($this->searchFilable as $key => $value) {
            if (array_key_exists($key, $RequestArray)) {
                $q->when($RequestArray[$key] != null, function ($q) use ($RequestArray, $key, $value) {
                    $q->where($value['filed'], $value['oprator'],  $RequestArray[$key]);
                });
            }
        }
        $q->when($search, function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        });
        // dd($q->toSql());
        //  area_id=1
        $employees = $q->limit(5)->get();
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
