<?php

namespace App\Http\Resources\Rating;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_name' => $this->student->name,
            'course_id' => $this->course_id,
            'rating' => $this->rating,
            'average_rating'=>$this->average_rating,
            'review' => $this->review ?? null,
        ];
    }
}
