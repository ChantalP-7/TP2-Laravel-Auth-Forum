@extends('layouts.layout')

@section('title', 'Espace Etudiant')

@section('content')
    <div class="container">
        <h2 class="text-center mb-5">Mon Profil</h2>
        <div class="row gx-5">
            <div class="col-6 card">
                <div class="card-header">Profil Étudiant</div>
                <div class="card-body">
                    <p><strong>@lang('Name'):</strong> {{ $user->name }}</p>
                    <p><strong>@lang('Email')</strong> {{ $user->username }}</p>
                    <!-- Autres infos sur l'étudiant -->
                </div>
            </div>            
            <div class="col-6">
                <h3>Mes Articles</h3>

                @if($articles->isEmpty())
                    <p>Vous n'avez pas encore publié d'articles.</p>
                @else
                    <ul>
                        @foreach($articles as $article)
                            <li>
                                <a href="{{ route('article.show-connect', $article->id) }}">
                                    {{ $article->title[app()->getLocale()] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection