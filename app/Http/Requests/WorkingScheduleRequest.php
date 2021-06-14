<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkingScheduleRequest extends FormRequest
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
            "working_day" => "required|max:7|min:7",
            "start_time" => "required",
            "end_time" => "required",
            "status_day" => "required",
            "status_hour" => "required",
            "staff_id" => "required",
        ];
    }
}
