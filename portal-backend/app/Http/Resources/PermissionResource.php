<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return //parent::toArray($request);
        [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description ?? '',
            'group' => $this->group ?? '',
            'created_at' => $this->created_at?->toDateTimeString() ?? null,
            'updated_at' => $this->updated_at?->toDateTimeString() ?? null,
            'deleted_at' => $this->updated_at?->toDateTimeString() ?? null,

        ];
    }
}
