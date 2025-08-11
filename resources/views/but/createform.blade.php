@extends('layout.app')

@section('title')
    Ajouter un but
@endsection

@section('main')
    <h2 class="title mb-4">Ajouter un but</h2>
    <form action="{{ route('but.store') }}" method="POST" class="form p-5 mb-5">
        @csrf
        {{-- <div class="input-group mb-3">
            <label for="name" class="input-group">Nom</label>
            <input type="text" name="name" id="name" class="form-control p-3" required>
        </div> --}}
        <div class="input-group mb-3">
            <label for="joueur_id" class="input-group">Joueur</label>
            <select name="joueur_id" id="joueur_id" class="form-control p-3" required>
                <option value=""></option>
                @foreach($joueurs as $joueur)
                    <option value="{{ $joueur->id }}">{{ $joueur->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <label for="equipe_id" class="input-group">Équipe</label>
            <select name="equipe_id" id="equipe_id" class="form-control p-3" required>
                <option value=""></option>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <label for="rencontre_id" class="input-group">Match</label>
            <select name="rencontre_id" id="rencontre_id" class="form-control p-3" required>
                @if($rencontre)
                    <option value="{{ $rencontre->id }}">Match #{{ $rencontre->id }}</option>
                @endif
            </select>
        </div>
        <div class="input-group mb-3">
            <label for="minute" class="input-group">Minute</label>
            <input type="number" name="minute" id="minute" class="form-control p-3" min="0" max="119" required>
        </div>
        <div class="input-group mb-3">
            <label for="nombre_buts" class="input-group">Nombre de buts</label>
            <input type="number" name="nombre_buts" id="nombre_buts" class="form-control p-3" min="1" required>
        </div>
        <div class="input-group mb-3">
            <label for="type" class="input-group">Type</label>
            <input type="text" name="type" id="type" class="form-control p-3">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection