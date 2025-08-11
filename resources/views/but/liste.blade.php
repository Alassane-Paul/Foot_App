@extends('layout.app')

@section('title')
    Liste des buts
@endsection

@section('main')
    <h2 class="title mb-4">Liste des buts</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Joueur</th>
                <th>Équipe</th>
                <th>Match</th>
                <th>Minute</th>
                <th>Nombre de buts</th>
                <th>Type</th>
                @if (Auth::check())
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($buts as $but)
                <tr>
                    <td>{{ $but->joueur->name ?? '' }}</td>
                    <td>{{ $but->equipe->name ?? '' }}</td>
                    <td>{{ $but->rencontre->id ?? '' }}</td>
                    <td>{{ $but->minute }}</td>
                    <td>{{ $but->nombre_buts }}</td>
                    <td>{{ $but->type }}</td>
                    @if (Auth::check())
                        <td>
                                
                            <a href="{{ route('but.show', $but->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('but.edit', $but->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('but.destroy', $but->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce but ?')">Supprimer</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection