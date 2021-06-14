<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServePatientRequest extends FormRequest
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
            "total_fee" => "required",
            "doc_id" => "required",
            "bed_allotment_id" => "nullable",
            "birth_report_id" => "nullable",
            "surgery_report_id" => "nullable",
            "medicine_purchase_id" => "nullable",
            "other_service_id" => "nullable",
            "pat_id" => "required",
            "total_payment_id" => "nullable",
        ];
    }

}
