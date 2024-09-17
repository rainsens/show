<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionnaireRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:2,200'],
            'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'description' => ['required', 'string', 'between:2,200'],
            'open' => ['required', 'boolean'],
        ];
    }
}
