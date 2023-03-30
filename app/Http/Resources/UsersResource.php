<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
                'username' => $this->username,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email ' => $this->email,
                'created_at ' => $this->created_at,
                'updated_at ' => $this->updated_at,
            ],
            'relationships' => [
                'role' => new RolesResource($this->role)
            ]
        ];
    }
}
