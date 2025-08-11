@extends('layout.app')

@section('title')
    Connexion
@endsection


@section('main')
    <div class="form p-5 mb-5">
        <h2 class="title">Ajouter une équipe</h2>
        <p class="indiq">Remplir les informations de l'équipe.</p>
        <form action="{{ route('equipe.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="indiq input-group mb-3">
                <label for="name" class="input-group-text"><b>Nom de l'équipe</b></label>
                <input type="text" class="form-control p-3" id="name" name="name" placeholder="Saisir le nom de l'équipe ici ...">
            </div>
            <div class="indiq input-group mb-3">
                <label for="logo" class="input-group-text"><b>logo de l'équipe (optionnel)</b></label>
                <input type="file" class="form-control p-3" id="logo" name="logo" placeholder="Saisir le logo de l'équipe ici ...">
            </div>
            <div class="indiq input-group mb-3">
                <label for="creation_year" class="input-group-text"><b>Année de création</b></label>
                <input type="number" class="form-control p-3" id="creation_year" name="creation_year" placeholder="Saisir l'année de création ici ...">
            </div>
            <div class="indiq input-group mb-3">
                <label for="coach" class="input-group-text "><b>Entraineur</b></label>
                <input type="text" class="form-control p-3" id="coach" name="coach" placeholder="Saisir le nom de l'entraineur ici ...">
            </div>
            <div class="indiq input-group mb-3">
                <label for="stade" class="input-group-text"><b>Stade</b></label>
                <input type="text" class="form-control p-3" id="stade" name="stade" placeholder="Saisir le nom du stade ici ...">
            </div>
            <div class="indiq input-group mb-3">
                <label for="players" class="input-group-text"><b>Nombre de joueurs</b></label>
                <input type="number" class="form-control p-3" id="players" name="players" placeholder="Saisir le nombre de joueurs ici ...">
            </div>
            <div class="indiq input-group mb-3">
                <label for="description" class="input-group-text"><b>Description (optionnel)</b></label>
                <textarea class="form-control p-3" id="description" name="description" rows="3" placeholder="Saisir une description ici ..."></textarea>
            </div>
            
            <div class="indiq pt-3">
                <button type="submit" class="btn btn-success" role="button"><b>Créer l'équipe</b></button>
            </div>
        </form>
    </div>
@endsection