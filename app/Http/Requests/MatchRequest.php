<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
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
            'home_team_id' => 'required|exists:equipes,id',
            'away_team_id' => 'required|exists:equipes,id',
            'stade_id' => 'required|exists:stades,id',
            'score' => 'nullable|integer|max:10',
            'buteurs' => 'nullable|array',
            'buteurs.*.joueur_id' => 'required|exists:joueurs,id',
            'buteurs.*.goals' => 'required|integer|min:0',
            'heure' => 'required|date_format:H:i',
            'jour' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages(): array
    {
        return [
            'home_team_id.required' => 'L\'équipe à domicile est requise.',
            'away_team_id.required' => 'L\'équipe à l\'extérieur est requise.',
            'stade_id.required' => 'Le stade est requis.',
            'score.integer' => 'Le score doit être un entier.',
            'buteurs.*.joueur_id.required' => 'Le joueur est requis pour chaque buteur.',
            'buteurs.*.goals.required' => 'Le nombre de buts est requis pour chaque buteur.',
            'heure.required' => 'L\'heure du match est requise.',
            'jour.required' => 'Le jour du match est requis.',
            'heure.date_format' => 'L\'heure doit être au format HH:MM.',
            'jour.date_format' => 'Le jour doit être au format YYYY-MM-DD.',
            'buteurs.*.goals.integer' => 'Le nombre de buts doit être un entier.',
            'buteurs.*.goals.min' => 'Le nombre de buts doit être au moins 0.',
            'buteurs.*.joueur_id.exists' => 'Le joueur sélectionné n\'existe pas.',
            'home_team_id.exists' => 'L\'équipe à domicile sélectionnée n\'existe pas.',
            'away_team_id.exists' => 'L\'équipe à l\'extérieur sélectionnée n\'existe pas.',
            'stade_id.exists' => 'Le stade sélectionné n\'existe pas.', 
        ];
    }
}
