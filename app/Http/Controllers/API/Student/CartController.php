<?php

namespace App\Http\Controllers\API\Student;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Student\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $courses = Cart::where('student_id', auth()->user()->id)->get();

        $total = $courses->sum(function ($cartItem) {
            return $cartItem->course->price;
        });

        return ApiResponse::sendResponse(Response::HTTP_OK, 'All courses retrieved successfully',
            [
                'courses' => CartResource::collection($courses),
                'total' => $total,
            ]);
    }

    public function store($id)
    {

        $existingCartItem = Cart::where('course_id', $id)
            ->where('student_id', Auth::user()->id)
            ->first();

        if ($existingCartItem) {
            return ApiResponse::sendResponse(Response::HTTP_CONFLICT, 'Course already exists in the cart', null);
        }
        $course = Cart::create(
            [
                'course_id' => $id,
                'student_id' => auth()->user()->id
            ]
        );
        return ApiResponse::sendResponse(Response::HTTP_OK, 'Course added to cart successfully', new CartResource($course));
    }

    public function destroy($id)
    {
        $existingCartItem = Cart::where('course_id', $id)
            ->where('student_id', Auth::user()->id)
            ->first();
        $existingCartItem->delete();
        return ApiResponse::sendResponse(Response::HTTP_OK, 'Course removed from cart successfully', null);
    }
}
