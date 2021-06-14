<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'working_day' => $this->working_day,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
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
