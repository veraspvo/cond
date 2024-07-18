<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDocumentoRequest extends FormRequest
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
            'nome_documento' => [
            'required',
            'string',
            'unique:documentos,nome_documento',
            'max:50',  
            //Rule::unique('documentos','nome_documento')->ignore($this->documento,'id') // ignora o documento que estiver sendo editado
            ],  
            
            // Senha obrigatória
            //    'password' => [
            //    'required',
            //    'min:8',
            //    'max:20',
            //],
        ];
    }
    public function messages(): array
    {
        return [
            'nome_documento.required' => 'O nome do documento é obrigatório',
        ];
    }
}
