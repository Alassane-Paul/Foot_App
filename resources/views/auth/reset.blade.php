
@extends('layout.app')

@section('title')
    Connexion
@endsection


@section('main')
    <div class="auth">
        <h2 class="title">Réinitialisation du mot de passe</h2>
        <p class="indiq">Remplissez vos informations pour vous réinitialiser votre mot de passe</p>
        <form action="{{ route('pass.reset') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label"><b>E-mail</b></label>
                <input type="text" class="form-control p-3" id="email" name="email" placeholder="Saisir l'adresse e-mail ici ...">
            </div>
            <div class="indiq">
                <button type="submit" class="btn btn-primary" role="button"><b>Réinitialiser</b></button>
            </div>
        </form>
    </div>
@endsection