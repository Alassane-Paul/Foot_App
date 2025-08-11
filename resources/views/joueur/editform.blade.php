@extends('layout.app')

@section('title')
    Modifier le joueur
@endsection

@section('main')
    <div class="form p-5 mb-5">
        <h2 class="title mb-4">Modifier le joueur</h2>
        <form action="{{ route('joueur.update', $joueur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <label for="name" class="input-group-text">Nom</label>
                <input type="text" name="name" id="name" class="form-control p-3" value="{{ $joueur->name }}" required>
            </div>
            <div class="input-group mb-3">
                <label for="profil" class="input-group-text">Profil (photo)</label>
                <input type="file" name="profil" id="profil" class="form-control p-3">
                @if($joueur->profil)
                    <img src="{{ asset('storage/' . $joueur->profil) }}" alt="Profil actuel" class="img-thumbnail mt-2" width="100">
                @endif
            </div>
            <div class="input-group mb-3">
                <label for="post" class="input-group-text">Poste</label>
                <input type="text" name="post" id="post" class="form-control p-3" value="{{ $joueur->post }}" required>
            </div>
            <div class="input-group mb-3">
                <label for="dorsard_number" class="input-group-text">Numéro de dossard</label>
                <input type="number" name="dorsard_number" id="dorsard_number" class="form-control p-3" value="{{ $joueur->dorsard_number }}">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection