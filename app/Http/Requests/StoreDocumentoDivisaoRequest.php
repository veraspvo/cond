<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentoDivisaoRequest extends FormRequest
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
            'om' => 'required',
            'divisao_id' => 'required',
            'documento_id' => 'required',
            'abrangencia' => 'required',
            'ativo' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'om.required' => 'O campo om é obrigatório',
            'divisao.required' => 'O campo divisão é obrigatório',
            'documento_id.required' => 'O campo documento é obrigatório',
            'abrangencia.required' => 'O campo abrangência é obrigatório',
            'ativo.required' => 'O campo ativo é obrigatório',
        ];
    }
}
