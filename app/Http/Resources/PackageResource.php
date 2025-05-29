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
            'testimonial_count'=>$this->testimonial_count,
            'testimonial_avg'=>$this->testimonial_avg,
            'difficulty'=>$this->fitness_level,
            'duration'=>$this->duration,
            'destination'=>$this->destination?->name,
            'url'=>route('package.detail',['url'=>$this->url])

        ];
    }
}
