<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDivisaoRequest extends FormRequest
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
            'divisao' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'om.required' => 'O campo OM é obrigatório',
            'divisao.required' => 'O campo Divisão é obrigatório',
        ];
    }
}
