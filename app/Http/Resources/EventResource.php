<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'is_featured' => $this->is_featured,
            'start_at' => $this->start_at,
            'name' => $this->name,
            'desc' => $this->desc,
            'location' => $this->location
        ];
    }
}
