<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            "name" => "required|string",
            "order_type" => "required|string",
            "no_of_color" => "required|string",
            "name_of_color" => "required|string",
            "height" => "required",
            "width" => "required",
            "unit" => "required|string",
            "type" => "required|string",
            "time_frame" => "required|string",
            "threading_cute_size" => ['required_if:order_type,1', 'boolean'],
            "placement" => "required|string",
            "applique" => ['required_if:order_type,1', 'boolean'],
            "design_format" => "required|string",
            "color_scheme" => "nullable|string",
            "extra_instruction" => "nullable|string",

        ];
    }
}
