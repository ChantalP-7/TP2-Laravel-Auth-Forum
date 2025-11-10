@extends('layouts.app')

@section('title', 'Espace Étudiant')

@section('content')
    <div class="container">
        <h2 class="text-center">Bienvenue, {{ $etudiant->nom }} !</h2>
        
        <!-- Affichage du profil étudiant -->
        <div class="profil">
            <h3>Profil Étudiant</h3>
            <ul>
                <li><strong>Nom :</strong> {{ $etudiant->nom }}</li>
                <li><strong>Email :</strong> {{ $etudiant->user->email }}</li> <!-- Email de l'utilisateur -->
                <li><strong>Date d'inscription :</strong> {{ $etudiant->created_at->format('d/m/Y') }}</li>
                <!-- Ajoute d'autres informations si nécessaire -->
            </ul>
        </div>

        <!-- Liste des articles de l'étudiant -->
        <div class="articles">
            <h3>Mes Articles</h3>
            @if($articles->isEmpty())
                <p>Vous n'avez pas encore publié d'article.</p>
            @else
                <ul>
                    @foreach($articles as $article)
                        <li>
                            <a href="{{ route('article.show', $article->id) }}">{{ $article->title[app()->getLocale()] }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection