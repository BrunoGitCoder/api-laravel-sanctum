<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'project_id' => ['required'],
            'description' => ['required', 'min:5', 'string']
        ];
    }

    public function messages() {
        return [
            'project_id.required' => 'Campo Project_id obrigatório.',

            'description.required' => 'Campo description obrigatório.',
            'description.min' => 'Mínimo de :min caracteres.',
            'description.string' => 'Tipo de dado inválido.'
        ];
    }
}
