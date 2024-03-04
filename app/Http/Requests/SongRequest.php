<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'numeric', 'min:0'],
            'gender' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:2048'],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'duration.required' => 'La duración es obligatoria.',
            'duration.numeric' => 'La duración debe ser un valor numérico.',
            'duration.min' => 'La duración debe ser mayor o igual a :min.',
            'gender.required' => 'El género es obligatorio.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.max' => 'La imagen no debe ser mayor a :max kilobytes.',
        ];
    }
}
