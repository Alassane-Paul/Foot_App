<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
class AuthRequest extends FormRequest
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
            'password' =>[
                'required',
                'password' => Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols(),
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'email.email' => "Entrer un e-mail valide",
            'email.required' => "E-mail requise",
            'email.exists' => "Cet e-mail n'existe pas dans notre base de données",
            'password.required' => "Mot de passe requis",
            'password.min' => "Le mot de passe doit comporter au moins 8 caractères",
            'password.mixedCase' => "Le mot de passe doit comporter des majuscules et des minuscules",
            'password.letters' => "Le mot de passe doit comporter des lettres",
            'password.numbers' => "Le mot de passe doit comporter des chiffres",
            'password.symbols' => "Le mot de passe doit comporter des symboles",
        ];
    }
}
