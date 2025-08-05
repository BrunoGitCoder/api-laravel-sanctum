<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'project_id' => ['required', 'unique:documents,project_id'],
            'file' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'project_id.required' => 'Campo Project_id obrigatório.',
            'project_id.unique' => 'O Projeto já tem um documento anexado.',

            'file.required' => 'Campo file obrigatório.',
            'file.string' => 'Tipo de dado inválido.'
        ];
    }
}
