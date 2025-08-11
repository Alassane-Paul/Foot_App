@extends('layout.app')

@section('title')
    Connexion
@endsection


@section('main')
    <div class="auth">
        <h2 class="title">Se connecter</h2>
        <p class="indiq">Remplir vos paramètres de connexion pour vous connecter à votre compte administrateur.</p>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label"><b>E-mail</b></label>
                <input type="text" class="form-control p-3" id="email" name="email" placeholder="Saisir l'adresse e-mail ici ...">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><b>Mot de passe</b></label>
                <input type="password" class="form-control p-3" id="password" name="password" placeholder="Saisir le mot de passe ici ...">
            </div>
            <div class="indiq">
                <a href="{{ route('pass.reset') }}" class="btn btnblue"><b>Mot de passe oublié ?</b></a>
            </div>
            <div class="indiq">
                <button type="submit" class="btn  btn-primary" role="button"><b>Se connecter</b></button>
            </div>
        </form>
    </div>
@endsection