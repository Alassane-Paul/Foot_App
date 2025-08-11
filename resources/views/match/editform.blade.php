@extends('layout.app')

@section('title')
    Modifier la rencontre
@endsection

@section('main')
    <div class="form p-5 mb-5">
        <h2 class="title mb-4">Modifier la rencontre</h2>
        <form action="{{ route('match.update', $match->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <label for="home_team_id" class="input-group-text">Équipe à domicile</label>
                <select name="home_team_id" id="home_team_id" class="form-control p-3" required>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}" @if($match->home_team_id == $equipe->id) selected @endif>
                            {{ $equipe->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <label for="away_team_id" class="input-group-text">Équipe extérieure</label>
                <select name="away_team_id" id="away_team_id" class="form-control p-3" required>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}" @if($match->away_team_id == $equipe->id) selected @endif>
                            {{ $equipe->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <label for="jour" class="input-group-text">Date du match</label>
                <input type="date" name="jour" id="jour" class="form-control p-3" value="{{ $match->jour }}" required>
            </div>
            <div class="input-group mb-3">
                <label for="stade_id" class="input-group-text">Stade</label>
                <select name="stade_id" id="stade_id" class="form-control p-3" required>
                    @foreach($stades as $stade)
                        <option value="{{ $stade->id }}" @if($match->stade_id == $stade->id) selected @endif>
                            {{ $stade->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <label for="heure" class="input-group-text">Heure</label>
                <input type="time" name="heure" id="heure" class="form-control p-3" value="{{ $match->heure }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection