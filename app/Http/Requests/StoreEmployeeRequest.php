<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:2'],
            'last_name' => ['required', 'string', 'min:2'],
            'email' => [
                'required',
                'regex:/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/i',
                Rule::unique('employees', 'email')->ignore($this->route('employee'))
            ],
            'phone_number' => [
                'required',
                'regex:/^\s*(?:\+?(\d{1,3}))?[ ]?([(]?(\d{4,5})[)]?)?[ ]?((\d{6,7}))\s*$/'
            ],
            'company_id' => 'required'
        ];
    }
}
