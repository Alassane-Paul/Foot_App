@extends('layout.app')

@section('title')
    Détails de match
@endsection

@section('main')
    <h2 class="title mb-4">Détails de match</h2>
    <div class="form indiq p-4 mb-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="text-center">
                <img src="{{ $match->home_team->logo ? asset('storage/' . $match->home_team->logo) : asset('images/logo.png') }}" alt="Logo domicile" width="80">
                <div style="width: 75px;">{{ $match->home_team->name }}</div>
            </div>
            <div class="text-center">
                <span class=" p-3 fs-3 fw-bold">{{ $totalButsHome ?? '0' }} - {{ $totalButsAway ?? '0' }} </span>
                <div class="text-muted">Score</div>
            </div>
            <div class="text-center">
                <img src="{{ $match->away_team->logo ? asset('storage/' . $match->away_team->logo) : asset('images/logo.png') }}" alt="Logo extérieur" width="80">
                <div style="width: 75px;">{{ $match->away_team->name }}</div>
            </div>
        </div>
        <div class="mb-2">
            <strong>Stade :</strong> {{ $match->stade->name }}
        </div>
        <div class="mb-2">
            <strong>Date :</strong> {{ $match->jour }} &nbsp; <strong>Heure :</strong> {{ $match->heure }}
        </div>
    </div>

    <div class="indiq mt-3 grdbtn">
        @if (Auth::check())
            <div class="p-3">
                <a href="{{ route('but.create', $match->id) }}" class="btn gbtn btn-success" >Signaler un but</a>
            </div>
            <div class="p-3">
                <a href="{{ route('match.update',$match->id) }}" class="btn gbtn btn-info" >Mettre à jour les informations</a>
            </div>
            <div class="p-3">
                <form action="{{ route('match.destroy', $match->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn gbtn btn-danger"  onclick="return confirm('Êtes-vous sûr de vouloir annuler ce match ?')">Annuler</button>
                </form>
            </div>
        @endif
        <div class="p-3">
            <a href="{{ route('match.liste') }}" class="btn gbtn btn-secondary" >Retour à la liste des matchs</a>
        </div>
    </div>
@endsection