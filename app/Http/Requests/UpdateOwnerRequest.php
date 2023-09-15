<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOwnerRequest extends FormRequest
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
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'sometimes|string|max:255',
        ];
    }
}
