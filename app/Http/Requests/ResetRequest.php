<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
            'email' => 'email|required|exists:users',
        ];
    }

    public function messages() : array
    {
        return [
            'email.email' => "Entrer un e-mail valide",
            'email.required' => "E-mail requise",
            'email.exists' => "Cet e-mail n'existe pas dans notre base de données",
        ];
    }
}
