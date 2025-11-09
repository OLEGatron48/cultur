<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'patronymic' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'birthday' => ['required', 'date'],
            'level' => ['required', 'integer'],
            'municipal_city' => ['required', 'string'],
            'municipal_name' => ['required', 'string'],
            'school_type' => ['required', 'string'],
            'school_name' => ['required', 'string'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'Этот email уже занят',
        ];
    }
}
