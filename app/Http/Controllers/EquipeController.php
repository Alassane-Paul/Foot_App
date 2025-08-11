<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipeRequest;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Stade;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    
    public function index()
    {
        $equipes = Equipe::all();
        return view('equipe.liste', compact('equipes'));
    }

    public function create()
    {
        $equipes = Equipe::all();
        return view('equipe.createform');
    }

    
    public function store(EquipeRequest $request)
    {
        $equipe = $request->validated();

        if ($request->hasFile('logo')) {
            $equipe['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Equipe::create($equipe);
        Stade::create([
            'name' => $request->stade,
        ]);
        return redirect()->route('equipe.liste')->with('success', 'Équipe créée avec succès.');
    }

    public function show(string $id)
    {
        $equipe = Equipe::where('id', $id)->first();
        $joueurs = Joueur::where('equipe_id', $id)->get();
        return view('equipe.detail', compact('equipe', 'joueurs'));
    }

    
    public function edit(string $id)
    {
        $equipe = Equipe::where('id', $id)->first();
        return view('equipe.editform', compact('equipe'));
    }

    
    public function update(EquipeRequest $request, string $id)
    {
        $equipe = Equipe::where('id', $id)->first();
        $info = $request->validated();

        if ($request->hasFile('logo')) {
            $info['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $equipe->update($info);

        return redirect()->route('equipe.liste')->with('success', 'Équipe mise à jour avec succès.');
    }

    
    public function destroy(string $id)
    {
        $equipe = Equipe::where('id', $id)->first();
        if ($equipe) {
            $equipe->delete();
            return redirect()->route('equipe.liste')->with('success', 'Équipe supprimée avec succès.');
        }
        return redirect()->route('equipe.liste')->with('error', 'Équipe non trouvée.');
    }
}
