<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'thumbnail'=>getImageUrl($this->thumbnail),
            'price'=>$this->price,
            'discounted_price'=>$this->discounted_price,
            'is_group'=>$this->is_group,
            'is_luxury'=>$this->is_luxury,
            'rating'=>$this->rating,
            'difficulty'=>$this->difficulty,
            'destination'=>$this->destination?->name,

        ];
    }
}
