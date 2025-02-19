<?php

namespace App\Http\Controllers\API\Instrutor;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\CourseRequest;
use App\Http\Resources\Course\CourseResource;
use App\Models\Course;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {

    }

    public function store(CourseRequest $request)
    {
        if(!Auth::guard('instructors')->check()){
            return ApiResponse::sendResponse(Response::HTTP_UNAUTHORIZED, 'Unauthorized', []);
        }
        $validated = $request->validated();
        $validated['instructor_id'] = auth()->user()->id;
        $validated['curriculum'] = json_encode($validated['curriculum']);
        $validated['course_day'] = json_encode($validated['course_day']);

        $course = Course::create($validated);
        return ApiResponse::sendResponse(Response::HTTP_OK, 'Course created successfully',new CourseResource($course));
    }
}
