<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "email_verified_at" => $this->email_verified_at,
            "cover_url" => $this->cover_path ? asset('storage/' . $this->cover_path) : null,
            "profile_url" => $this->profile_path,
        ];
    }
}
