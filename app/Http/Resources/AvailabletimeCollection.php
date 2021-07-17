<?php

namespace App\Http\Resources;
use App\Models\Availabletime;

use Illuminate\Http\Resources\Json\JsonResource;

class AvailabletimeCollection extends JsonResource
{
    public $collects = Availabletime::class;
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
            'resort' =>  $this->resort,
            'district' =>  $this->resort->district,
            'features' => $this->features,
            'reviews' => $this->reviews,
            'cost' => $this->cost,
        ];
    }
}
