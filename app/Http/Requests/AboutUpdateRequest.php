<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUpdateRequest extends FormRequest
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
            'bigtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'bigtitle.required' => 'Заполните поле',
            'title.required' => 'Заполните поле',
            'content.required' => 'Заполните поле',
            'image.required' => 'Загрузите изоброжение',
        ];
    }
}
