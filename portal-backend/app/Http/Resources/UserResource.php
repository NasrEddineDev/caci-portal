<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public static $wrap = false;
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
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->role_id,
            'profile_id' => $this->profile_id,
            'organization_id' => $this->organization_id,
            'email_verfied_at' => $this->email_verfied_at,
            'created_at' => $this?->created_at?->toDateTimeString(),
            'updated_at' => $this?->updated_at?->toDateTimeString(),
            'deleted_at' => $this->updated_at?->toDateTimeString() ?? null,

        ];
    }
}
