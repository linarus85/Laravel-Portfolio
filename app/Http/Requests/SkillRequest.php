<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'bigtitle' => 'nullable|string|max:255',
            'skilltitle' => 'required|string|max:255',
            'content' => 'nullable|string',
            'text' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'skilltitle.required' => 'Заполните поле',
            'text.required' => 'Заполните поле',
        ];
    }
}
