<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GarageResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'garage_id'     => $this->offsetGet('garage_id'),
            'name'          => $this->offsetGet('name'),
            'hourly_price'  => $this->offsetGet('hourly_price'),
            'currency'      => $this->offsetGet('currency'),
            'contact_email' => $this->offsetGet('contact_email'),
            'point'         => $this->offsetGet('latitude') . ' ' . $this->offsetGet('longitude'),
            'country'       => $this->offsetGet('country'),
            'owner_id'      => $this->offsetGet('owner_id'),
            'garage_owner'  => $this->offsetGet('garage_owner'),
        ];
    }
}
