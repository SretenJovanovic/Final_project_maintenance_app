<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipementsResource extends JsonResource
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
                'name' => $this->name,
                'manufacturer' => $this->manufacturer,
                'model' => $this->model,
                'description ' => $this->description, 
                'status ' => $this->status, 
                'created_at ' => $this->created_at, 
                'updated_at ' => $this->updated_at, 
            ],
            'relationships' => [
                'section' =>[
                    'id' => (string)$this->section->id,
                    'name' => $this->section->name,
                    'created_at ' => $this->created_at, 
                    'updated_at ' => $this->updated_at, 
                ]
            ]
            ];
    }
}
