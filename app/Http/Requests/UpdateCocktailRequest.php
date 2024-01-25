<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCocktailRequest extends FormRequest
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
            'name'  => ['required', 'min:2', 'max:100'],
            'price' => ['required'],
            'ingredient' => ['required', 'min:2', 'max:250'],
            'glass_type' => ['required'],
            'instruction' => ['required', 'min:5']
        ];
    }
}
