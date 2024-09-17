<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->user()->id;
        return [
            'name' => ['required', Rule::unique('users')->ignore($userId)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($userId)],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'title' => ['required', 'min:6', 'max:255'],
            'address' => ['required', 'min:6', 'max:255'],
            'social' => ['required', 'array'],
            'social.*' => ['required', 'min:6', 'max:10'],
            'interest' => ['required', 'min:6', 'max:300'],
            'credit' => ['required'],
        ];
    }
}
