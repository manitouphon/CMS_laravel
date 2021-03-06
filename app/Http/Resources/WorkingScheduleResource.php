<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Staff;

class WorkingScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status_day' => $this->status_day,
            'status_hour' => $this->status_hour,
            /* ===========get staff from relationship in table working schedule============= */
            'staff' => $this->staffs,
        ];
    }
    public function staffs()
    {
        return $this->staffs;
    }
}
