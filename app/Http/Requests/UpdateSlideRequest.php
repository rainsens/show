<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSlideRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slide' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'title' => ['nullable', 'string', 'min:2', 'max:255'],
        ];
    }
}
