<?php

namespace App\Http\Resources;
// namespace App\Http\Resources\ResortCollection;

use Illuminate\Http\Resources\Json\JsonResource;

class ResortCollection extends JsonResource
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
            "id"=>$this->id,
            "name"=>$this->name,
            "description"=>$this->description,
            "district"=>$this->district,
            "city"=>$this->district->city,
            "country"=>$this->district->city->country,
        ];
    }
}
