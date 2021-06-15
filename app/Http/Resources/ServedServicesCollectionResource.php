<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServedServicesCollectionResource extends JsonResource
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
            'patient'=>$this->patients,
            'serve_service_bed' => $this->servedservices->bedAllotments,
            'serve_service_birth' => $this->servedservices->birthReports,
            'serve_service_surgery' => $this->servedservices->surgeryReports
        ];
    }
}
