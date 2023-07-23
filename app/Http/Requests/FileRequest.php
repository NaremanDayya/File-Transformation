<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'title' => ['required','string','max:255'],
            'description' => 'nullable|string|max:255',
            'file_path' => 'file',
        ];
    }
     public function messages(): array
    {
        return [
            'title.required' => "Please insert a :attribute it's important",
            'description.max' => "The description is too long",
        ];
    }
}
