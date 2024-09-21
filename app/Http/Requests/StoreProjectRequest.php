<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'initiator' => ['required', 'string', 'between:2,100'],
            'cover' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'title' => ['required', 'string', 'between:2,200'],
            'brief' => ['required', 'string', 'between:2,200'],
            'detail' => ['required', 'string', 'between:2,500'],
            'progress' => ['required', 'numeric', 'between:0,100'],
            'team' => ['boolean'],
            'team_name' => ['required', 'string', 'between:2,200'],
        ];
    }
}
