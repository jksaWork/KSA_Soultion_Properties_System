<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnersRequest extends FormRequest
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
        $roles =  [
            'name' => 'required',
            'email' => 'email|unique:owners,email',
            'bank_id' => 'required',
            'subarea_id' => 'required',
            'province_id' => 'required',
            'phone' => 'required|numeric',
            'id_number' => 'required',
            'iban_number' => 'required',
            'address' => 'required',
            // 'agent_id' => 'nullable',
        ];
        // dd(request()->email);
        if (request()->method() == 'PUT') {
            $roles['email'] = 'exists:owners,email';
        }
        // dd($email);
        return $roles;
    }
}
