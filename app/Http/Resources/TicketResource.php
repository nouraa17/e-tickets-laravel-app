<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'title' => $this->title,
            'type' => $this->type,
            'description' => $this->description,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : 'N/A',
            'published_at' => $this->created_at ? $this->created_at->diffForHumans() : 'N/A',
        ];
    }
}
