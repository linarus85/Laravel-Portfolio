<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'title' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните поле',
            'email.required' => 'Заполните поле',
            'phone.required' => 'Заполните поле',
        ];
    }
}
