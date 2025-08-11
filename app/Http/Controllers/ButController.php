<?php

namespace App\Http\Controllers;

use App\Http\Requests\ButRequest;
use App\Models\But;
use App\Models\Joueur;
use App\Models\Equipe;
use App\Models\Rencontre;
use Illuminate\Http\Request;

class ButController extends Controller
{
    public function index()
    {
        $buts = But::with(['joueur', 'equipe', 'rencontre'])->latest()->get();
        return view('but.liste', compact('buts'));
    }

    public function create($id)
    {
        $rencontre = Rencontre::where('id', $id)->first();
        $equipes = Equipe::where('id', $rencontre->away_team_id)->orWhere('id', $rencontre->home_team_id)->get();
        $joueurs = Joueur::whereIn('equipe_id', [$rencontre->away_team_id, $rencontre->home_team_id])->get();

        // $joueurs = Joueur::whereIn('equipe_id', $equipes->pluck('id'))->get();
        return view('but.createform', compact('joueurs', 'equipes', 'rencontre'));
    }

    public function store(ButRequest $request)
    {
        $but = But::create($request->validated());
        return redirect()->route('but.liste')->with('success', 'But ajouté avec succès.');
    }

    public function show($id)
    {
        $but = But::with(['joueur', 'equipe', 'rencontre'])->findOrFail($id);
        return view('but.detail', compact('but'));
    }

    public function edit($id)
    {
        $but = But::findOrFail($id);
        $joueurs = Joueur::all();
        $equipes = Equipe::all();
        $rencontres = Rencontre::all();
        return view('but.editform', compact('but', 'joueurs', 'equipes', 'rencontres'));
    }

    public function update(ButRequest $request, $id)
    {
        $but = But::findOrFail($id);
        $but->update($request->validated());
        return redirect()->route('but.liste')->with('success', 'But modifié avec succès.');
    }

    public function destroy($id)
    {
        $but = But::findOrFail($id);
        $but->delete();
        return redirect()->route('but.liste')->with('success', 'But supprimé avec succès.');
    }
}