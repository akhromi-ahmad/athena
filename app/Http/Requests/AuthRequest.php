<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'username' => trim($this->username ?? ''),
        ]);
    }

    public function rules(): array
    {
        $isSignup = $this->routeIs('user.signup');

        return [
            'username' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9]+$/',
                'max:30',
                'min:5',
                $isSignup ? Rule::unique('users', 'username') : null,
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                $isSignup ? 'confirmed' : null,
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username is required',
            'username.string' => 'Username must be a string',
            'username.regex' => 'Username must be alphanumeric',
            'username.max' => 'Username must be at most 30 characters',
            'username.min' => 'Username must be at least 5 characters',
            'username.unique' => 'Username already exists',
            'password.required' => 'Password is required',
            'password.string' => 'Password must be a string',
            'password.min' => 'Password must be at least 8 characters',
        ];
    }
}
