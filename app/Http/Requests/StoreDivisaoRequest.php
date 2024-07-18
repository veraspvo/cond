<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDivisaoRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer esta requisição
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
            'divisao' => [
                'required',
                ],
        ];
    }

    public function messages(): array
    {
        return [
            'om.required' => 'Por favor, informe a OM.',
            'divisao.required' => 'Por favor, informe a Divisão.',
        ];
    }
}
