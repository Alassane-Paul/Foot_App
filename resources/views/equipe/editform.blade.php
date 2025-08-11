@extends('layout.app')

@section('title')
    Modifier l'équipe
@endsection

@section('main')
    <div class="indiq form p-5 mb-5">
        <h2 class="title">Modifier l'équipe: {{ $equipe->name }}</h2>
        <p class="indiq">Mettez à jour les informations de l'équipe.</p>
        <form action="{{ route('equipe.update', $equipe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <label for="name" class="input-group-text">Nom de l'équipe</label>
                <input type="text" class="form-control p-3" id="name" name="name" value="{{ $equipe->name }}" required>
            </div>
            <div class="input-group mb-3">
                <label for="coach" class="input-group-text">Entraîneur</label>
                <input type="text" class="form-control p-3" id="coach" name="coach" value="{{ $equipe->coach }}" required>
            </div>
            <div class="input-group mb-3">
                <label for="creation_year" class="input-group-text">Année de création</label>
                <input type="number" class="form-control p-3" id="creation_year" name="creation_year" value="{{ $equipe->creation_year }}" required>
            </div>
            <div class="input-group mb-3">
                <label for="stadium" class="input-group-text">Stade</label>
                <input type="text" class="form-control p-3" id="stadium" name="stadium" value="{{ $equipe->stadium }}" required>
            </div>
            <div class="input-group mb-3">
                <label for="players" class="input-group-text">Nombre de joueurs</label>
                <input type="text" class="form-control p-3" id="players" name="players" value="{{ $equipe->players }}" required>
            </div>
            <div class="input-group mb-3">
                <label for="description" class="input-group-text">Description</label>
                <textarea class="form-control p-3" id="description" name="description" rows="3" required>{{ $equipe->description }}</textarea>
            </div>
            <div class="input-group mb-3">
                <label for="logo" class="input-group-text">Logo</label>
                <input type="file" class="form-control p-3" id="logo" name="logo">
            </div>
            <div class="input-group mb-3 indiq">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection