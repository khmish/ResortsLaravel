<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentCollection extends JsonResource
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
            "id" => $this->id,
            "rentedBy" => $this->user,
            "rentedDate" => $this->rentedDate,
            "state" => $this->state,
            "AvailableTime_id" => $this->availabletime,
            "resort" => $this->availabletime->resort,
        ];
    }
}
