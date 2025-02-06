<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'title' => 'required|min:5',
            'homepage' => 'required|min:5',
            'overview' => 'required|min:5',
            'vote_average' => 'nullable|numeric|min:0|max:10',
            'release_date' => 'nullable|date_format:Y/m/d',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.min' => 'El título debe tener al menos 5 caracteres.',
            'homepage.min' => 'La homepage debe tener al menos 5 caracteres.',
            'overview.min' => 'La overview debe tener al menos 5 caracteres.',
            'vote_average.numeric' => 'La media de votos debe ser numérica.',
            'vote_average.min' => 'La media de votos debe ser superior a 0.',
            'vote_average.max' => 'La media de votos debe ser inferior a 10.',
            'release_date.date_format' => 'Formato YYYY/mm/dd'
        ];
    }
}
