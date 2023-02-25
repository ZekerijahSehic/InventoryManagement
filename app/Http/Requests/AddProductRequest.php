<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/', 'max:32'],
            'description' => ['required', 'max: 255'],
            'quantity' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ];
    }
}
