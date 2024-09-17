<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'when' => ['required', 'date'],
            'event' => ['required', 'string', 'between:2,50'],
            'summary' => ['required', 'string', 'between:2,200'],
        ];
    }
}
