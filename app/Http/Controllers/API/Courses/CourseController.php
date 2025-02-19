<?php

namespace App\Http\Controllers\API\Courses;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Course\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::get();
        return ApiResponse::sendResponse(Response::HTTP_OK, 'All courses',CourseResource::collection($courses));
    }

    public function show($id)
    {
        $courses = Course::where('category_id',$id)->get();
        return ApiResponse::sendResponse(Response::HTTP_OK, 'Course retrieved successfully',CourseResource::collection($courses));
    }
}
