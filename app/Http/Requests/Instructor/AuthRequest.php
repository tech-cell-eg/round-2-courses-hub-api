<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class AuthRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:instructors,email',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:male,female',
            'birth_date' => 'required|date',
            'nationality' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'first_address' => 'required|string|max:255',
            'second_address' => 'nullable|string|max:255',
            'zip_code' => 'required|string|max:20',
            'choose_file' => 'nullable|string|max:255',
            'password' => ['required', Rules\Password::defaults()],
            'intended_study_field' => 'required|string|max:255',
            'degree-sought' => 'required|string|max:255',
            'begin-studies' => 'required|string|max:255',
        ];
    }
}
