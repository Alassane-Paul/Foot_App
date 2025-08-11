@extends('layout.app')

@section('title')
    Inscription
@endsection


@section('main')
    <div class="auth">
        <h2 class="title">S'Inscrire</h2>
        <p class="indiq">Remplir les paramètres d'inscription pour créer un compte administrateur.</p>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><b>Nom</b></label>
                <input type="text" class="form-control p-3" id="name" name="name" placeholder="Saisir le nom ici ...">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><b>E-mail</b></label>
                <input type="text" class="form-control p-3" id="email" name="email" placeholder="Saisir l'adresse e-mail ici ...">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><b>Mot de passe</b></label>
                <input type="password" class="form-control p-3" id="password" name="password" placeholder="Saisir le mot de passe ici ...">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label"><b>Confirmer le mot de passe</b></label>
                <input type="password" class="form-control p-3" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe ici ...">
            </div>
            <div class="indiq">
                <button type="submit" class="btn  btn-primary" role="button"><b>Inscrire</b></button>
            </div>
        </form>
    </div>
@endsection