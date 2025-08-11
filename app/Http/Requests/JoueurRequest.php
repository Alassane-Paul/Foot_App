<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoueurRequest extends FormRequest
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
            'name' => 'required|string',
            'profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post' => 'required|string',
            'equipe_id' => 'required|integer|min:1|max:50',
            'dorsard_number' => 'required|integer|min:1|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du joueur est requis.',
            'profil.image' => 'Le profil doit être une image valide.',
            'post.required' => 'La position du joueur est requise.',
            'equipe_id.required' => 'L\'équipe est requise.',
            'dorsard_number.required' => 'Le numéro de dorsard est requis.',
            'dorsard_number.integer' => 'Le numéro de dorsard doit être un entier.',
        ];
    }
}
