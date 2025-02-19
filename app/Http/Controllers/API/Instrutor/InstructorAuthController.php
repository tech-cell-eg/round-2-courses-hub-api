<?php

namespace App\Http\Controllers\API\Instrutor;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\AuthRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class InstructorAuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        $validated = $request->validated();
        $validated['password']= Hash::make($validated['password']);
        $instructor = Instructor::create($validated);
        $data['token'] = $instructor->createToken('auth_instructor_token')->plainTextToken;
        $data['name'] = $instructor->first_name.' '.$instructor->last_name;
        $data['email'] = $instructor->email;

        return ApiResponse::sendResponse(Response::HTTP_CREATED, 'Student registered successfully', $data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(Response::HTTP_UNPROCESSABLE_ENTITY, 'Validation error', $validator->errors());
        }

        // Find instructor by email
        $instructor = Instructor::where('email', $request->email)->first();

        // Check if instructor exists and verify password
        if (!$instructor || !Hash::check($request->password, $instructor->password)) {
            return ApiResponse::sendResponse(Response::HTTP_UNAUTHORIZED, 'These credentials do not match our records.', []);
        }

        // Generate Sanctum token
        $data['token'] = $instructor->createToken('auth_instructor_token')->plainTextToken;
        $data['name'] = $instructor->first_name . ' ' . $instructor->last_name;
        $data['email'] = $instructor->email;

        return ApiResponse::sendResponse(Response::HTTP_OK, 'Instructor logged in successfully', $data);
    }

}
