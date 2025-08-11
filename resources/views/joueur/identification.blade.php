@extends('layout.app')

@section('title')
    Identification du joueur
@endsection

@section('main')
    <div class="form p-5 mb-5">
        <h2 class="title mb-4">Identification du joueur</h2>
        <form action="{{ route('joueur.identifier') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <label for="name" class="input-group-text">Nom</label>
                <input type="text" name="name" id="name" class="form-control p-3" required>
            </div>
            <div class="input-group mb-3">
                <label for="profil" class="input-group-text">Profil (photo)</label>
                <input type="file" name="profil" id="profil" class="form-control p-3">
            </div>
            <div class="input-group mb-3">
                <label for="post" class="input-group-text">Poste</label>
                <input type="text" name="post" id="post" class="form-control p-3" required>
            </div>
            <div class="input-group mb-3">
                <label for="equipe_id" class="input-group-text">Équipe</label>
                <input type="text" name="equipe_id" id="equipe_id" class="form-control p-3" value="{{ $equipeid }}" readonly>
            </div>
            <div class="input-group mb-3">
                <label for="dorsard_number" class="input-group-text">Numéro de dossard</label>
                <input type="number" name="dorsard_number" id="dorsard_number" class="form-control p-3">
            </div>
            <button type="submit" class="btn btn-primary">Identifier</button>
        </form>
    </div>
@endsection