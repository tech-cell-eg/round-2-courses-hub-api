<?php

namespace App\Http\Controllers\API\Instructor;

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

        $instructor = Instructor::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'birth_date' => $validated['birth_date'],
            'nationality' => $validated['nationality'],
            'country' => $validated['country'],
            'city' => $validated['city'],
            'first_address' => $validated['first_address'],
            'second_address' => $validated['second_address'],
            'zip_code' => $validated['zip_code'],
            'choose_file' => $validated['choose_file'],
            'password' => Hash::make($validated['password']),
            'intended_study_field' => $validated['intended_study_field'],
            'degree-sought'=>$validated['degree-sought'],
            'begin-studies'=>$validated['begin-studies'],
        ]);
        $data['token'] = $instructor->createToken('auth_instructor_token')->plainTextToken;
        $data['name'] = $instructor->first_name.' '.$instructor->last_name;
        $data['email'] = $instructor->email;

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

        if (Auth::guard('instructors')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $instructor = Auth::guard('instructors')->user(); // الحصول على المستخدم من الحارس المخصص
            $data['token'] = $instructor->createToken('API TOKEN')->plainTextToken;
            $data['name'] = $instructor->first_name . ' ' . $instructor->last_name;
            $data['email'] = $instructor->email;

            return ApiResponse::sendResponse(Response::HTTP_CREATED, 'Instructor logged in successfully', $data);
        }
        return ApiResponse::sendResponse(Response::HTTP_UNAUTHORIZED, ' these credentials do not match our records.', []);

    }
}
