@extends('layout.app')

@section('title')
    Nouvelle rencontre
@endsection

@section('main')
    <div class="form p-5 mb-5">
        <h2 class="title mb-4">Créer une rencontre</h2>
        <form action="{{ route('match.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <label for="home_team_id" class="input-group-text">Équipe à domicile</label>
                <select name="home_team_id" id="home_team_id" class="form-control p-3" required>
                    <option value=""></option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}">{{ $equipe->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <label for="away_team_id" class="input-group-text">Équipe extérieure</label>
                <select name="away_team_id" id="away_team_id" class="form-control p-3" required>
                    <option value=""></option>
                    @foreach($equipes as $equipe)
                        <option value="{{ $equipe->id }}">{{ $equipe->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <label for="jour" class="input-group-text">Date du match</label>
                <input type="date" name="jour" id="jour" class="form-control p-3" required>
            </div>
            <div class="input-group mb-3">
                <label for="stade_id" class="input-group-text">Stade</label>
                <select name="stade_id" id="stade_id" class="form-control p-3" required>
                    <option value=""></option>
                    @foreach($stades as $stade)
                        <option value="{{ $stade->id }}">{{ $stade->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="input-group mb-3">
                <label for="score" class="input-group-text">Score</label>
                <input type="number" name="score" id="score" class="form-control p-3">
            </div>
            <div class="input-group mb-3">
                <label for="buteurs" class="input-group-text">Buteurs (JSON ou texte)</label>
                <textarea name="buteurs" id="buteurs" class="form-control p-3"></textarea>
            </div> --}}
            <div class="input-group mb-3">
                <label for="heure" class="input-group-text">Heure</label>
                <input type="time" name="heure" id="heure" class="form-control p-3" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection