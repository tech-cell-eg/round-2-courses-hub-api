<?php

namespace App\Http\Resources\Event;

use App\Http\Resources\Category\CategoryResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'location' => $this->location,
            'start_date' => Carbon::parse($this->start_date)->format('Y-m-d'),
            'end_date' => Carbon::parse($this->end_date)->format('Y-m-d'),
            'price' => $this->price,
            'category' => $this->category ? new CategoryResource($this->category) : null,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
