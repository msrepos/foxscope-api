<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScopeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'code'         => $this->code,
            'note'         => $this->note,
            'views'        => $this->views,
            'visits'       => $this->visits,
            'img'          => $this->img,
            'lat'          => $this->lat,
            'lng'          => $this->lng,
            'country_code' => $this->country_code,
            'privacy'      => $this->country_code,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,

            // Related models
            'type'   => new ScopeTypeResource($this->whenLoaded('type')),
            'status' => new ScopeStatusResource($this->whenLoaded('status')),
        ];
    }
}
