<?php

namespace App\Http\Controllers\API\Student;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        $validated = $request->validated();

        $student = User::create($validated);
        $data['token'] = $student->createToken('auth_token')->plainTextToken;
        $data['name'] = $student->name;
        $data['email'] = $student->email;

        return ApiResponse::sendResponse(Response::HTTP_CREATED, 'Student registered successfully', $data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => ['required', Rules\password::defaults()],
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(Response::HTTP_UNPROCESSABLE_ENTITY, 'Validation error', $validator->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $student = Auth::user();
            $data['token'] = $student->createToken('API TOKEN')->plainTextToken;
            $data['name'] = $student->name;
            $data['email'] = $student->email;
            return ApiResponse::sendResponse(Response::HTTP_CREATED, 'User Loged in successfully', $data);
        }
        return ApiResponse::sendResponse(Response::HTTP_UNAUTHORIZED, ' these credentials do not match our records.', []);

    }
}
