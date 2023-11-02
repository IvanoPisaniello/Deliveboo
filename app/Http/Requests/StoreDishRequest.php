<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'title' => 'required|max:100|string',
            'description' => 'required|string',
            'price' => 'required|min:0|decimal:2',
            'visible' => 'required|digits_between:0,1',
            'image' => 'nullable|file',
            'discount' => 'integer|min:0|max:100|nullable',
            'ingredients' => 'required|string'
        ];
    }
}
