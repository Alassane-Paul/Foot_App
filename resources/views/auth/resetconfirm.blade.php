@extends('layout.app')

@section('title')
    Connexion
@endsection


@section('main')
    <div class="auth">
        <h2 class="title">Réinitialisation du mot de passe</h2>
        <p class="indiq">Entrer le mot de passe à six caractère envoyer au <b><i>{{$email->email}}</i></b>.</p>
        <form action="{{ route('pass.change') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label"><b>E-mail</b></label>
                <input type="text" class="form-control p-3" id="email" name="email" placeholder="Saisir l'e-mail ici ...">
            </div>
            <div class="mb-3">
                <label for="code" class="form-label"><b>Code</b></label>
                <input type="text" class="form-control p-3" id="code" name="code" placeholder="Saisir le code ici ...">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><b>Mot de passe</b></label>
                <input type="password" class="form-control p-3" id="password" name="password" placeholder="Saisir le mot de passe ici ...">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label"><b>Confirmer</b></label>
                <input type="password" class="form-control p-3" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe ici ...">
            </div>
            <div class="indiq">
                <button type="submit" class="btn btn-primary" role="button"><b>Se connecter</b></button>
            </div>
        </form>
    </div>
@endsection