<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'course_description' => 'required|string',
            'what_will_i_learn_from_this_course' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'language' => 'required|string|max:50',
            'curriculum' => 'required|json',
            'skill_level' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'course_day' => 'required|json',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
            'enrolled_number' => 'required|integer|min:0',
//            'instructor_id' => 'required|exists:instructors,id',
            'review_id' => 'nullable|exists:reviews,id',
        ];
    }
}
