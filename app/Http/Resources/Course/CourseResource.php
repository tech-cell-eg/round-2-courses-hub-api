<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'course_description' => $this->course_description,
            'what_will_i_learn' => $this->what_will_i_learn_from_this_course,
            'category' => $this->category->name,
            'language' => $this->language,
            'curriculum' => is_array($this->curriculum) ? $this->curriculum : json_decode($this->curriculum, true) ?? [],
            'skill_level' => $this->skill_level,
            'price' => $this->price,
            'course_day' => is_array($this->course_day) ? $this->course_day : json_decode($this->course_day, true) ?? [],
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'enrolled_number' => $this->enrolled_number,
//            'review' => $this->review ? new ReviewResource($this->review) : null,
        ];

    }
}
