<?php

namespace App\Http\Controllers\API\Courses;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Rating\RatingResource;
use App\Models\Course;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RatingController extends Controller
{
    public function store(Request $request, $course_id)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        $rating = Rating::updateOrCreate(
            ['user_id' => auth()->id(), 'course_id' => $course_id],
            ['rating' => $validated['rating'], 'review' => $validated['review'] ?? null]
        );

        return ApiResponse::sendResponse(Response::HTTP_OK, 'Rating saved successfully', new RatingResource($rating));
    }

    public function show($course_id)
    {
        $ratings = Rating::where('course_id', $course_id)->get();
        $course = Course::where('id', $course_id)->first();

        if (!$course) {
            return ApiResponse::sendResponse(Response::HTTP_NOT_FOUND, 'Course not found', []);
        }

        $averageRating = $course->averageRating();
        return ApiResponse::sendResponse(Response::HTTP_OK, 'All ratings retrieved successfully', ['averageRating' => $averageRating,
            RatingResource::collection($ratings)]);
    }
}
