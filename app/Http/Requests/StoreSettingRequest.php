<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'key'          => ['required', 'string', 'unique:settings,key,except,id', 'max:255'],
            'value'        => ['required', 'string', 'max:255'],
            'description'  => ['nullable', 'string', 'max:255'],
        ];
    }
}
