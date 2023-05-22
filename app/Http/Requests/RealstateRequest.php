<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealstateRequest extends FormRequest
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
            "unit_id" => "required",
            "realstate_number" => "required",
            "floors_number" => "required",
            'unit_number' => "required",
            "owner_id" => "required",
            "instrument_number" => "required",
            'instrument_date' => "required",
            'province_id' => "required",
            "subarea_id" => "required",
            "address" => "required",
            "map_address" => "required",
            "national_address" => "required",
            "electricity_account_number" => "required",
            "electricity_service_number" => "required",
            "water_account_number" => "required",
        ];
    }
}
