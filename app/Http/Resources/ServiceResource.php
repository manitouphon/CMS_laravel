<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'serve' => parent::toArray($request),
            'patient' => $this->servedService->patients,
            'doctor' => $this->servedService->doctors,
        ];
    }
}
