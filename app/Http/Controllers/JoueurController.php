<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoueurRequest;
use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;

class JoueurController extends Controller
{
    public function index(string $id)
    {
        $equipeid = $id;
        $equipe = Equipe::findOrFail($id);
        $joueurs = Joueur::where('equipe_id', $id)->get();
        return view('equipe.detail', compact('joueurs', 'equipeid', 'equipe'));
    }
 

    public function create($equipeid)
    {
        return view('joueur.identification', compact('equipeid'));
    }

    public function store(JoueurRequest $request)
    {
        $joueur = $request->all();

        if ($request->hasFile('profil')) {
            $joueur['profil'] = $request->file('profil')->store('profils', 'public');
        }

        Joueur::create($joueur);
        // $equipe = Equipe::findOrFail($request->equipe_id);
        return redirect()->route('equipe.joueurs', ['id' => $request->equipe_id])->with('success', 'Joueur ajouté avec succès.');
    }

    public function show(string $id)
    {
        $joueur = Joueur::findOrfail($id);
        $equipe = Equipe::where('id', $joueur->equipe_id)->first();
        return view('joueur.detail', compact('joueur', 'equipe'));
    }

    public function edit(string $id)
    {
        $joueur = Joueur::findOrfail($id);
        $equipe = Equipe::findOrfail($joueur->equipe_id);
        return view('joueur.editform', compact('joueur', 'equipe'));
    }

    public function update(Request $request, string $id)
    {
        $joueur = Joueur::findOrfail($id);
        $info = $request->all();

        if ($request->hasFile('profil')) {
            $info['profil'] = $request->file('profil')->store('profils', 'public');
        }

        $joueur->update($info);

        return redirect()->route('equipe.joueurs', ['id' => $joueur->equipe_id])->with('success', 'Joueur mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $joueur = Joueur::findOrfail($id);
        $equipeid = $joueur->equipe_id;
        $joueur->delete();

        return redirect()->route('equipe.joueurs', ['id' => $equipeid])->with('success', 'Joueur supprimé avec succès.');
    }
}

