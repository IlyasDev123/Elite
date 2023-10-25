<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateBusinessRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'phone' => 'required|numeric|unique:users,phone,NULL,id,deleted_at,NULL',
            'address' => 'required|string|max:255',
            'state_id' => 'required|numeric|exists:states,id',
            'city_id' => 'required|numeric|exists:cities,id',
        ];
    }
}
