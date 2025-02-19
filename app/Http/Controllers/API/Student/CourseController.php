<?php

namespace App\Http\Controllers\API\Student;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    public function index()
    {
    }

    public function show()
    {
        $student = User::find(1);
        $courses = $student->courses;
    }

    public function store($id)
    {
        $course = Course::find($id);
        $user = auth()->user();

        if ($course->students()->where('student_id', $user->id)->exists()) {
            return ApiResponse::sendResponse(Response::HTTP_CONFLICT, 'You are already registered for this course', null);
        }
        $course->students()->attach($user->id);

        return ApiResponse::sendResponse(Response::HTTP_OK, 'Course added successfully', $course);
    }



    public function destroy()
    {
    }
}
