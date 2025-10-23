@extends('layouts.layout')
@section('title', 'Utilisateurs')
@section('content')
    <h1>Liste des utilisateurs</h1>
    
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Étudiant associé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->etudiant)
                            {{ $user->etudiant->nom }}
                        @else
                            Aucun étudiant
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user.show', $user->id) }}">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection