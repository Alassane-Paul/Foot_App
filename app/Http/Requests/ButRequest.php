<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ButRequest extends FormRequest
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
            'joueur_id' => 'required|exists:joueurs,id',
            'equipe_id' => 'required|exists:equipes,id',
            'rencontre_id' => 'required|exists:rencontres,id',
            'minute' => 'required|integer|min:0|lt:120',
            'nombre_buts' => 'required|integer|min:1',
            'type' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'joueur_id.required' => 'Le joueur est requis.',
            'equipe_id.required' => 'L\'équipe est requise.',
            'rencontre_id.required' => 'Le match est requis.',
            'minute.required' => 'La minute du but est requise.',
            'minute.integer' => 'La minute doit être un entier.',
            'minute.min' => 'La minute doit être au moins 0.',
            'minute.lt' => 'La minute doit être inférieure à 120.',
            'nombre_buts.required' => 'Le nombre de buts est requis.',
            'nombre_buts.integer' => 'Le nombre de buts doit être un entier.',
            'nombre_buts.min' => 'Le nombre de buts doit être au moins 1.',
        ];
    }
}
