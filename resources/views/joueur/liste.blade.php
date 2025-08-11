@extends('layout.app')

@section('title')
    Liste des joueurs
@endsection


@section('main')
    <h1 class="title">Liste des joueurs</h1>

    <div class="form jgrid p-3 mb-3">
        @foreach ($joueurs as $joueur)
            <div class="card joueur indiq mb-3" style="width: 18rem;">
                @if ($joueur->profil)
                    <img src="{{ asset('storage/' . $joueur->profil) }}" class="card-img-top" alt="{{ $joueur->name }}"  width="50">
                @else
                    <img src="{{ asset('images/player.png') }}" class="card-img-top" alt="Profil de {{ $joueur->name }}" width="50">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $joueur->name }}</h5>
                    <div class="indiq">
                        <a href="{{ route('joueur.detail', $joueur->id) }}" class="btn btn-info">Voir les détails</a>
                        <a href="{{-- route('joueur.edit', $joueur->id) --}}" class="btn btn-warning">Modifier</a>
                        {{-- <form action="{{ route('joueur.destroy', $joueur->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <div class="indiq">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?')">Supprimer</button>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        @endforeach
        @if($joueurs->isEmpty())
            <p class="indiq">Aucun joueur identifié.</p>
        @endif
    </div>
    @if (Auth::check())
        <div class="indiq mb-5">
            <a href="{{ route('joueur.creation', $equipeid) }}" class="btn btn-success">Identifier un joueur</a>
        </div>    
    @endif
    @endsection
