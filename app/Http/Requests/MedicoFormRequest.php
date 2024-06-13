<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoFormRequest extends FormRequest
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
            'nombre' => 'required|string|max:100',
            'especialidad' => 'required|string|max:100',
            'aniosservicio' => 'required|numeric',
            'foto' => 'nullable|mimes:jpeg,bmp,png|max:2048', // Adding max size constraint
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
            'especialidad.required' => 'La especialidad es obligatoria.',
            'especialidad.max' => 'La especialidad no puede tener más de 100 caracteres.',
            'aniosservicio.required' => 'Los años de servicio son obligatorios.',
            'aniosservicio.numeric' => 'Los años de servicio deben ser un número.',
            'foto.mimes' => 'La foto debe ser un archivo de tipo: jpeg, bmp, png.',
            'foto.max' => 'La foto no puede ser mayor de 2MB.',
        ];
    }
}
