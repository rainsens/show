<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionnaireRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'between:2,200'],
            'cover' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'description' => ['required', 'string', 'between:2,200'],
            'open' => ['required', 'boolean'],
        ];
    }
}
