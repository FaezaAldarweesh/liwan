<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class booking_holeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->user->name,
            'hole'=>$this->hole->name,
            'type'=>$this->plan->name,
            'total price' => $this->total_price,
            'date'=>$this->date,
        ];
    }
}
