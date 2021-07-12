<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvailabletimeCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'availableDate' => $this->availableDate,
            'startTime' => $this->startTime,
            'endTime' => $this->endTime,
            'resort' => [
                "id"=> $this->resort->id,
                "name"=> $this->resort->name,
                "description"=> $this->resort->description,
                "media"=> $this->resort->media,
                "longitude"=> $this->resort->longitude,
                "latitude"=> $this->resort->latitude,
                "dist"=>$this->resort->district->name,
                "city"=>$this->resort->district->city->name,
                "country"=>$this->resort->district->city->country->name,

            ],
            'features' => $this->features,
            'reviews' => $this->reviews,
            'cost' => $this->cost,
        ];
    }
}
