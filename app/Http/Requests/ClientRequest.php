<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'email' => 'email|unique:clients,email',
            'phone' => 'required|numeric',
            // 'nationalaity_id' => 'required',
            'id_type' => 'required',
            'id_number' => 'required',
            'subarea_id' => 'required',
            'province_id' => 'required',
            'address' => 'required',
        ];
        // dd(request()->email);
        if (request()->method() == 'PUT') {
            $roles['email'] = 'exists:clients,email';
        }
        // dd($email);
        return $roles;
    }
}