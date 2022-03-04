<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FlightsResource extends JsonResource
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
            'city_code' => $this->city,
            // 'city_fullname' => 'Екатеринбург, Россия',
            'city_name' => $this->city,
            'code' => '',
            // 'country_code' => $this->city,
            'country_name' => '',
            // 'title' => 'Екатеринбург',
            // '_score' => 3487863,
            '_type' => 'city'

            // 'city_code' => 'SVX',
            // 'city_fullname' => 'Екатеринбург, Россия',
            // 'city_name' => 'Екатеринбург',
            // 'code' => 'SVX',
            // 'country_code' => 'RU',
            // 'country_name' => 'Россия',
            // 'title' => 'Екатеринбург',
            // '_score' => 3487863,
            // '_type' => 'city'
        ];
        return parent::toArray($request);
    }
}
