<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnuncioRequest extends FormRequest
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
            'titulo' => 'required',
            'category_id' => 'required',
            'state_id' => 'required',
            'municipio_id' => 'required',
            'body' => 'required',
            'is_active' => 'required',
            'plan_id' => 'nullable',
        ];
    }

        public function messages(){
        return [
            'titulo.required' => 'El titulo es requerido',
            'body.required' => 'La descripción es requerida'
        ];
    }
}
