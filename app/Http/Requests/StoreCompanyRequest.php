<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', Rule::unique('companies', 'name')->ignore($this->route
            ('company'))],
            'logo' => ['image', 'dimensions:max_width=100,max_height=100'],
            'email' => ['required', 'regex:/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/i', Rule::unique('companies', 'email')->ignore($this->route
            ('company'))],
            'website' => ['required', Rule::unique('companies', 'website')->ignore($this->route
            ('company'))],
        ];
    }
}
