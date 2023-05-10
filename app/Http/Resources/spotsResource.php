<?php

namespace App\Http\Resources;


use App\Models\vaccines;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class spotsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $vaccines = Vaccines::select(
            "users.id",
            "users.name",
            "users.email",
            "countries.name as country_name"
        )
            ->Join("countries", "countries.id", "=", "users.country_id")
            ->get();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'serve' => $this->serve,
            'capacity' => $this->capacity,
            'available_vaccines' => $this->vaccines,
        ];
    }
}
