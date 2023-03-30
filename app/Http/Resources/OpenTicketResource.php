<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OpenTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'description' => $this->description,
                'status' => $this->status,
                'created_at ' => $this->created_at,
                'updated_at ' => $this->updated_at,
            ],
            'relationships' => [
                'user' => new UsersResource($this->user),
                'equipement' => new EquipementsResource($this->equipement),
                'ticket_category' => new TicketCategoryResource($this->ticketCategory),
            ]
        ];
    }
}
