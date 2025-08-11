@extends('layout.app')

@section('title')
    Modifier l'équipe
@endsection

@section('main')
    <div class="form p-5 mb-5">
        <h1>Détails du joueur</h1>
        <p><strong>Nom:</strong> {{ $joueur->name }}</p>
        <p><strong>Équipe:</strong> {{ $equipe->name }}</p>
        @if ($joueur->profil)
            <img src="{{ asset('storage/' . $joueur->profil) }}" alt="{{ $joueur->name }}" class="img-fluid mb-3" style="max-width: 200px;">
        @endif
        <p><strong>Poste:</strong> {{ $joueur->post }}</p>
        <p><strong>Numéro de dorsard:</strong> {{ $joueur->dorsard_number }}</p>
        <p><strong>Identifiant:</strong> {{ $joueur->id }}</p>
        <div class="indiq mb-3">
            <p><strong>Date de création:</strong> {{ $joueur->created_at }}</p>
        </div>
        @if (Auth::check())
            <div class="indiq mb-3 d-flex justify-content-between">
                <a href="{{ route('joueur.update', $joueur->id) }}" class="btn btn-warning">Mettre à jour</a>
                <form action="{{ route('joueur.destroy', $joueur->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <div class="indiq">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?')">Supprimer</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection