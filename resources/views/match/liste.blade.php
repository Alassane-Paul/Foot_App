@extends('layout.app')

@section('title')
    Accueil
@endsection


@section('main')
    <h2 class="title">Les matchs du championnat</h2>
    <div class="p-3 mb-3 grd">
        
        @foreach ($rencontres as $match)
        
            <a href="{{ route('match.detail',$match->id) }}" class=" mb-3 btn btn-success">
                <div class="card p-3 mb-3 indiq match-details">
                    @php
                        $matchDate = \Carbon\Carbon::parse($match->jour);
                        $matchStart = \Carbon\Carbon::parse($match->jour . ' ' . $match->heure);
                        $matchEnd = $matchStart->copy()->addHours(2);
                    @endphp
                <span class="badge 
                    @if($matchDate->isToday()) bg-warning 
                    @elseif($matchDate->isPast()) bg-secondary 
                    @else bg-success 
                    @endif
                    ms-2">
                    @if($matchDate->isToday())
                        {
                            @if($moment->lt($matchStart))
                                Aujourd'hui
                            @elseif($moment->between($matchStart, $matchEnd))
                                En cours
                            @else
                                Terminé
                            @endif
                        }
                    @elseif($matchDate->isPast())
                        Terminé
                    @else
                        À venir
                    @endif
                </span>
                    <h3>
                        <img src="{{ $match->home_team->logo ? asset('storage/' . $match->home_team->logo) : asset('images/logo.png') }}" alt="Logo domicile" width="75">
                        vs
                        <img src="{{ $match->away_team->logo ? asset('storage/' . $match->away_team->logo) : asset('images/logo.png') }}" alt="Logo extérieur" width="75">
                    </h3>
                    <p>{{ $match->jour }} {{ $match->heure }}</p>
                    <p>{{ $match->stade->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
        @if(Auth::check())
            <div class="indiq">
                <a href="{{ route('match.create') }}" class="btn btn-success">Créer une rencontre</a>
            </div>
        @endif
    </div>
@endsection