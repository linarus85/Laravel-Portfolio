<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'icon' => 'required|string',
            'image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните поле',
            'icon.required' => 'Заполните поле',
            'image.required' => 'Загрузите изоброжение',
        ];
    }
}
