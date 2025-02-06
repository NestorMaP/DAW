<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:20',
            'surname' => 'required|string|min:2|max:20',
            'nickname' => 'required|string|min:2|max:20|unique:users',
            'email' => 'required|string|min:2|max:255|unique:users',
            'password' => 'required|confirmed' // Confirmed verifies that password and password_confirmation are the same
        ];
    }
    public function messages() {
        return [
            'name.required' => 'El Nombre es obligatorio.',
            'name.string' => 'El Nombre debe tener carácteres alfanuméricos solamente',
            'name.min' => 'El Nombre debe tener al menos 2 caracteres.',
            'name.max' => 'El Nombre debe tener como máximo 20 caracteres',

            'surname.required' => 'El Apellido es obligatorio.',
            'surname.string' => 'El Apellido debe tener carácteres alfanuméricos solamente',
            'surname.min' => 'El Apellido debe tener al menos 2 caracteres.',
            'surname.max' => 'El Apellido debe tener como máximo 20 caracteres',

            'nickname.required' => 'El Nick es obligatorio.',
            'nickname.string' => 'El Nick debe tener carácteres alfanuméricos solamente',
            'nickname.min' => 'El Nick debe tener al menos 2 caracteres.',
            'nickname.max' => 'El Nick debe tener como máximo 20 caracteres',
            'nickname.unique' => 'El Nick ya está en uso, elige otro o haz Login',

            'email.required' => 'El Email es obligatorio.',
            'email.string' => 'El Email debe tener carácteres alfanuméricos solamente',
            'email.min' => 'El Email debe tener al menos 2 caracteres.',
            'email.max' => 'El Email debe tener como máximo 20 caracteres',
            'email.unique' => 'El Nick ya está en uso, elige otro o haz Login',

            'password.required' => 'La contraseña es obligatoria',
            'password.confirmed' => 'Las contraseñas deben coincidir'
        ];
    }
}
