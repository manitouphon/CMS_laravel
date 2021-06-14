<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            "medicine_name" => "required",
            "category" => "required|string",
            "company" => "nullable|string",
            "qty" => "required|integer",
            "buy_price" => "required",
            "sell_price" => "required",
            "status" => "required",
            "description" => "required",
        ];
    }
}
