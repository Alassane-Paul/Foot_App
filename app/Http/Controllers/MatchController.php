<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchRequest;
use App\Models\But;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Rencontre;
use App\Models\Stade;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rencontres = Rencontre::all();
        $today = Carbon::today();
        $moment = Carbon::now();
        // $matchDate = Carbon::parse($rencontres->first()->jour);
        return view('match.liste', compact('rencontres', 'moment', 'today'));
    }

    public function create()
    {
        
        $stades = Stade::all();
        $equipes = Equipe::all();
        return view('match.matchform', compact('equipes', 'stades'));
    }

    public function store(MatchRequest $request)
    {
        $match = $request->validated();

        Rencontre::create($match);

        return redirect()->route('match.liste')->with('success', 'Match créé avec succès.');   
    }

    public function show(string $id)
    {
        $match = Rencontre::where('id', $id)->first();
        $totalButsHome = But::where('rencontre_id', $id)
            ->where('equipe_id', $match->home_team_id)
            ->sum('nombre_buts');
        $totalButsAway = But::where('rencontre_id', $id)
            ->where('equipe_id', $match->away_team_id)
            ->sum('nombre_buts');

        return view('match.detail', compact('match', 'totalButsHome', 'totalButsAway'));
    }

    public function edit(string $id)
    {
        $match = Rencontre::where('id', $id)->first();
        $stades = Stade::all();
        $equipes = Equipe::all();
        return view('match.editform', compact('match', 'equipes', 'stades'));
    }

    public function update(Request $request, string $id)
    {
        $match = Rencontre::where('id', $id)->first();
        $match->update($request->all());
        return redirect()->route('match.liste')->with('success', 'Match mis à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $match = Rencontre::where('id', $id)->first();
        $match->delete();
        return redirect()->route('match.liste')->with('success', 'Match annulé avec succès.');
    }
}
