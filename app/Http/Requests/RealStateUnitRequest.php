<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealStateUnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'halls_number'  => "required",
            'unit_id' => 'required',
            'room_number'  => "required",
            'bathroom_number'  => "required",
            'external_doors_number'  => "required",
            'space'  => "required",
            'virtual_value'  => "required",
            'activity_type'  => "required",
            "electricity_account_number" => "required",
            "water_account_number" => "required",
            'floor_number' => 'required',
        ];
    }
}
