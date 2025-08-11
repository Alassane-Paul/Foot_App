@extends('layout.app')

@section('title')
    Détail du but
@endsection

@section('main')
    <h2 class="title mb-4">Détail du but</h2>
    <div class="card form p-4">
        <p><strong>Joueur :</strong> {{ $but->joueur->name ?? '' }}</p>
        <p><strong>Équipe :</strong> {{ $but->equipe->name ?? '' }}</p>
        <p><strong>Match :</strong> {{ $but->match->id ?? '' }}</p>
        <p><strong>Minute :</strong> {{ $but->minute }}</p>
        <p><strong>Nombre de buts :</strong> {{ $but->nombre_buts }}</p>
        <p><strong>Type :</strong> {{ $but->type }}</p>
        <a href="{{ route('but.liste') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
@endsection