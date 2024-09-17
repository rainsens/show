<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class StoreMaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $mimetypes = Arr::join(config('filesystems.mimetypes'), ',');

        return [
            'material' => ['required', 'file', "mimetypes:{$mimetypes}", 'max:2048'],
            'title' => ['nullable', 'string', 'min:2', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'material.mimetypes' => 'The :attribute must be a file of types: pdf, doc, docx, xls, xlsx, ppt, pptx, mp4.',
        ];
    }
}
