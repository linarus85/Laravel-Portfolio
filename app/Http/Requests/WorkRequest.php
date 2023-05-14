<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'bigtitle' => 'nullable|string',
            'title' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'link' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните поле',
            'program.required' => 'Заполните поле',
            'link.required' => 'Заполните поле',
            'description.required' => 'Заполните поле',
            'image.required' => 'Загрузите изоброжение',
        ];
    }
}
