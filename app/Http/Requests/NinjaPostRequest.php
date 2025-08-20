<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NinjaPostRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'skill' => ['required', 'integer', 'min:0', 'max:100'],
            'bio' => ['required', 'string', 'min:20', 'max:1000'],
            'dojo_id' => ['required', 'exists:dojos,id'],
        ];
    }
}
