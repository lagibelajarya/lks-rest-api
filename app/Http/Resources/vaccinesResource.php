<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class vaccinesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        // $vaccineId =  $this->vaccinesCheck->pluck('pivot')->pluck('vaccine_id');
        return [
            $this->name =>  $this->id  ? true : false,
        ];
    }
}
