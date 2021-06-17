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
            "doc_id" => "required",
            "patient_id" => "required",
            "medicine_purchase_id" => "nullable",
            "total_payment_id" => "nullable",
            "surgery_report_id" => "nullable",
            "name" => "required",
            "remark" => "nullable",
            "des" => "required",
        ];
    }

}
