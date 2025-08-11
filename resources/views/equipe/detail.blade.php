@extends('layout.app')

@section('title')
    Détails de l'équipe
@endsection

@section('main')
    <div class="p-5">
        <h2 class="title">{{ $equipe->name }}</h2>
        <h4 class="indiq mb-4">Informations sur l'équipe.</h4>
        <div class="fr2">

            <div class="">
                @if ($equipe->logo)
                    <img src="{{ asset('storage/' . $equipe->logo) }}" class="img-fluid" alt="{{ $equipe->name }}">
                @else
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Default Logo" style="width: 150px;">
                @endif
            </div>
            <div class="">
                <p><strong>Entraîneur:</strong> {{ $equipe->coach }}</p>
                <p><strong>Année de création:</strong> {{ $equipe->creation_year }}</p>
                <p><strong>Stade:</strong> {{ $equipe->stade }}</p>
                <p><strong>Nombre de joueurs:</strong> {{ $equipe->players }}</p>
                <p><strong>Description:</strong> {{ $equipe->description }}</p>
            </div>
        </div>
        <div class="grd p-3 mb-3">
            @foreach ($joueurs as $joueur)
                <div class="card joueur indiq mb-3" style="width: 275px;">
                    @if ($joueur->profil)
                        <img src="{{ asset('storage/' . $joueur->profil) }}" class="card-img-top" alt="{{ $joueur->name }}" height="100" width="50">
                    @else
                        <img src="{{ asset('images/player.png') }}" class="card-img-top" alt="Profil de {{ $joueur->name }}" width="50">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $joueur->name }}</h5>
                        @if (Auth::check())
                            <div class="indiq">
                                <a href="{{ route('joueur.detail', $joueur->id) }}" class="btn btn-info">Voir les détails</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            @if($joueurs->isEmpty())    
                <p class="indiq">Aucun joueur identifié.</p>
            @endif
        </div>
    </div>
    <div class="indiq mt-3 grdbtn">
        @if (Auth::check())
            <div class="p-3">
                <a href="{{ route('joueur.creation', $equipe->id) }}" class="btn gbtn btn-success">Identifier les joueurs</a>
            </div>
            {{-- <div class="indiq mb-5">
            <a href="{{ route('joueur.creation', $equipeid) }}" class="btn gbtn btn-success">Identifier un joueur</a>
        </div> --}}
            <div class="p-3">
                <a href="{{ route('equipe.update',$equipe->id) }}" class="btn gbtn btn-info">Mettre à jour les informations</a>
            </div>
            <div class="p-3">
                <form action="{{ route('equipe.destroy', $equipe->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn gbtn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette équipe ?')">Supprimer</button>
                </form>
            </div>
        @endif
        <div class="p-3">
            <a href="{{ route('equipe.liste') }}" class="btn gbtn btn-secondary">Retour à la liste des équipes</a>
        </div>
    </div>

@endsection