<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'creation_year' => 'required|integer|min:1800|max:' . date('Y'),
            'coach' => 'required|string|max:255',
            'stade' => 'required|string|max:255',
            'players' => 'required|integer|min:1|max:50',
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de l\'équipe est requis.',
            'logo.image' => 'Le logo doit être une image valide.',
            'logo.mimes' => 'Le logo doit être au format jpeg, png, jpg, gif ou svg.',
            'logo.max' => 'Le logo ne doit pas dépasser 2 Mo.',
            'creation_year.required' => 'L\'année de création est requise.',
            'creation_year.integer' => 'L\'année de création doit être un nombre entier.',
            'creation_year.min' => 'L\'année de création doit être supérieure ou égale à 1800.',
            'creation_year.max' => 'L\'année de création ne peut pas être supérieure à l\'année en cours.',
            'coach.required' => 'Le nom de l\'entraîneur est requis.',
            'stade.required' => 'Le nom du stade est requis.',
            'players.required' => 'Le nombre de joueurs est requis.',
            'players.integer' => 'Le nombre de joueurs doit être un nombre entier.',
            'players.min' => 'Le nombre de joueurs doit être au moins 1.',
            'players.max' => 'Le nombre de joueurs ne peut pas dépasser 50.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'description.max' => 'La description ne doit pas dépasser 1000 caractères.',
        ];
    }
}
