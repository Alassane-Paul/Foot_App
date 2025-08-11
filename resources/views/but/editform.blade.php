@extends('layout.app')

@section('title')
    Modifier le but
@endsection

@section('main')
    <h2 class="title mb-4">Modifier le but</h2>
    <form action="{{ route('but.update', $but->id) }}" method="POST" class="form p-5 mb-5">
        @csrf
        @method('PUT')
        <div class="indiq input-group mb-3">
            <label for="name" class="input-group-text">Nom</label>
            <input type="text" name="name" id="name" class="form-control p-3" value="{{ $but->name }}" required>
        </div>
        <div class="indiq input-group mb-3">
            <label for="joueur_id" class="input-group-text">Joueur</label>
            <select name="joueur_id" id="joueur_id" class="form-control p-3" required>
                @foreach($joueurs as $joueur)
                    <option value="{{ $joueur->id }}" @if($but->joueur_id == $joueur->id) selected @endif>{{ $joueur->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="indiq input-group mb-3">
            <label for="equipe_id" class="input-group-text">Équipe</label>
            <select name="equipe_id" id="equipe_id" class="form-control p-3" required>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}" @if($but->equipe_id == $equipe->id) selected @endif>{{ $equipe->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="indiq input-group mb-3">
            <label for="match_id" class="input-group-text">Match</label>
            <select name="match_id" id="match_id" class="form-control p-3" required>
                @foreach($rencontres as $match)
                    <option value="{{ $match->id }}" @if($but->match_id == $match->id) selected @endif>Match #{{ $match->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="indiq input-group mb-3">
            <label for="minute" class="input-group-text">Minute</label>
            <input type="number" name="minute" id="minute" class="form-control p-3" value="{{ $but->minute }}" min="0" max="119" required>
        </div>
        <div class="indiq input-group mb-3">
            <label for="nombre_buts" class="input-group-text">Nombre de buts</label>
            <input type="number" name="nombre_buts" id="nombre_buts" class="form-control p-3" value="{{ $but->nombre_buts }}" min="1" required>
        </div>
        <div class="indiq input-group mb-3">
            <label for="type" class="input-group-text">Type</label>
            <input type="text" name="type" id="type" class="form-control p-3" value="{{ $but->type }}">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection