<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'initiator' => ['required', 'string', 'between:2,100'],
            'cover' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'title' => ['required', 'string', 'between:2,200'],
            'brief' => ['required', 'string', 'between:2,200'],
            'detail' => ['required', 'string', 'between:2,1000'],
            'progress' => ['required', 'numeric', 'between:0,100'],
            'team' => ['boolean'],
            'team_name' => ['required_if:team,1', 'string', 'between:2,200'],
            'private' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'team_name.required_if' => 'The team name field is required for a team project.',
        ];
    }
}
