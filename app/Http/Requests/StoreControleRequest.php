<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreControleRequest extends FormRequest
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
            'documentos_divisoes_id' => 'required',
            //'con_numero_documento' => 'required',
            //'con_data' => 'required',
            //'con_observacao' => 'required',
            //'con_login' => 'required',
            //'con_setor' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'documentos_divisoes_id.required' => 'O campo Documento é obrigatório.',
            'con_numero_documento.required' => 'O campo Número do Documento é obrigatório.',
            'con_data.required' => 'O campo Data é obrigatório.',
            'con_observacao.required' => 'O campo Observação é obrigatório.',
            'con_login.required' => 'O campo Login é obrigatório.',
            'con_setor.required' => 'O campo Setor é obrigatório.',
        ];
    }
}
