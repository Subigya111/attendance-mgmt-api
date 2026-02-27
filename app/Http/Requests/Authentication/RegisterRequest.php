<?php

namespace App\Http\Requests\Authentication;
use Illuminate\Http\Request;

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
    public function rules():array
    {
        return [
            'role'=>'required',
            'name'=>'required|string|min:4|max:30',
            'email'=>'required|email|unique:users',
            'password'=>[
                'required',
                'confirmed',
            //     Password::min(8)
            //         ->letters()      // Requires at least one letter
            //         ->mixedCase()    // Requires at least one uppercase and one lowercase letter
            //         ->numbers()      // Requires at least one number
            //         ->symbols()      // Requires at least one symbol (!, $, #, %)
            //         ->uncompromised(), // Checks against the Have I Been Pwned database
            ],
        ];
    }
}

