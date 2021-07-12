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
            'resort' => $this->resort,
            'features' => $this->features,
            'reviews' => $this->reviews,
            'cost' => $this->cost,
        ];
    }
}
