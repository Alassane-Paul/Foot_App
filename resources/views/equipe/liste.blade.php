@extends('layout.app')

@section('title')
    Liste d'équipes
@endsection


@section('main')
    <h1 class="title">Parcourir toutes les équipes</h2>
        
        <div class="p-3 mb-3 grd">
            @foreach ($equipes as $equipe)
                <a href="{{ route('equipe.detail',$equipe->id) }}" class="btn" style="background: #2E2E2E;">
                    <div class="card indiq mb-3">
                        <div style="width: 100px; height: 100px;" class="card-img-top mt-3">
                            @if ($equipe->logo)
                            <img src="{{ asset('storage/' . $equipe->logo) }}" class="card-img-top" alt="{{ $equipe->name }}">
                            @else
                            <img src="{{ asset('images/logo.png') }}" class="card-img-top" alt="Default Logo">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $equipe->name }}</h5>
                            <p class="card-text">Entraîneur: {{ $equipe->coach }}</p>
                            <p class="card-text">Joueurs: {{ $equipe->players }}</p>
                            
                            
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        @if($equipes->isEmpty())
            <p class="indiq">Aucune équipe trouvée.</p>
        @endif
        @if (Auth::check())
            <div class="indiq mb-5">
                <a href="{{ route('equipe.creation') }}" class="btn btn-success">Ajouter une équipe</a>
            </div>          
        @endif
@endsection