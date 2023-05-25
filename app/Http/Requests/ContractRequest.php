<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'payment_way' => 'required',
            'contract_number' => 'required',
            'end_date' => 'required',
            'contract_date' => 'required',
            'start_date' => 'required',
            'amount' => 'required',
            'client_id' => 'required',
            'realstate_id' => 'required',
        ];
    }
}
