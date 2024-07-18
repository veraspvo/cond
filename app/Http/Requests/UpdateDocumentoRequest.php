<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateDocumentoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       // $rules = parent::rules();
    

        //Tornando a senha opcional
      //  $rules['password'] = [
      //      'nullable',
      //      'min:8',
      //      'max:20',
      //  ];
      //  return $rules;

        return [
            'nome_documento' => [
            'required',
            'string',
            //'unique:documentos,nome_documento',
            'max:50',  
            Rule::unique('documentos','nome_documento')->ignore($this->documento,'id') // ignora o documento que estiver sendo editado
            ],
            
            //Tornando a senha opcional
            //'password' => [
            //  'nullable',
            //'min:8',
            //'max:20',
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
