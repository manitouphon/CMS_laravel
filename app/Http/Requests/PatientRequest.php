<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'first_name' => "required",
            'last_name' => "required",
            'dob' => "required",
            'sex' => "required|max:2|min:1",
            'blood_group' => "required",
            'phone_number' => "required",
            'address' => "required",
            'email' => "required",
            'img_url' => "required",
            'medical_history' => "required",
        ];
    }
}
