@extends('layouts.layout')
@section('title', 'Utilisateur')
@section('content')
    <h1>Détails de l'utilisateur : {{ $user->name }}</h1>

    <p><strong>Email :</strong> {{ $user->email }}</p>

    @if($etudiant)
        <h2>Étudiant associé</h2>
        <p><strong>Nom :</strong> {{ $etudiant->nom }}</p>
        <p><strong>Adresse :</strong> {{ $etudiant->adresse }}</p>
        <p><strong>Téléphone :</strong> {{ $etudiant->telephone }}</p>
        <p><strong>Date de naissance :</strong> {{ $etudiant->dateNaissance }}</p>
        <p><strong>Courriel :</strong> {{ $etudiant->courriel }}</p>
        <p><strong>Ville :</strong> {{ $etudiant->ville->name ?? 'Non renseignée' }}</p>
    @else
        <p>Aucun étudiant associé à cet utilisateur.</p>
    @endif

    <a href="{{ route('user.index') }}">Retour à la liste des utilisateurs</a>
@endsection