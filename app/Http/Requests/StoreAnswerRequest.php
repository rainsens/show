<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_ids.*' => ['required', 'integer', 'exists:questions,id'],
            'answers.*' => ['required', 'string', 'between:2,250'],
        ];
    }

    public function messages(): array
    {
        return [
            'answers.*.required' => 'The answer field is required.',
            'answers.*.string' => 'The answer field must be a string.',
            'answers.*.between' => 'The answer field must be between 2 and 250 characters.',
        ];
    }
}
