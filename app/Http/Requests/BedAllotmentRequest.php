<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BedAllotmentRequest extends FormRequest
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
            "bed_type" => "required",
            "bed_number" => "required",
            "allotment_date" => "nullable",
            "allotment_time" => "nullable",
            "is_discharge" => "required",
            "discharge_date" => "required",
            "discharge_time" => "required",
            "service_fee" => "required",
            "patient_id"=>"required",
            "nurse_id" => "required",
        ];
    }
}
