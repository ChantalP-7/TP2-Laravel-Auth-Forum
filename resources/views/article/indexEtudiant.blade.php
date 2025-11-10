@extends('layouts.layout')

@section('title', 'Mes articles')

@section('content')
     <table>
        <thead>
            <tr>
                <th>@lang('Titles.Title', ['Title'])</th>
                <th>@lang('Category', ['Category'])</th>
                <th>@lang('Actions')</th>
            </tr>
        </thead>

        <tbody>
            @foreach($articles as $article)
                <tr>                   
                    <td>
                    @php
                        $locale = app()->getLocale(); // Langue active (par exemple 'fr' ou 'en')
                    @endphp
                    @if(is_array($article->title) && isset($article->title[$locale]))
                        {{ $article->title[$locale] }} ({{ $locale }})  <!-- Affiche le titre pour la langue active -->
                    @elseif(is_string($article->title))
                        {{ $article->title }}  <!-- Si title est une chaîne simple, l'affiche directement -->
                    @else
                        {{ __('No title available') }}  <!-- Affiche un message par défaut si title est vide ou mal formaté -->
                    @endif
                    </td>
                    <td>
                        {{ $article->category ? ($article->category->category[$locale] ?? $article->category->category['en']) : '' }}
                    </td>

                    <td>
                        <a class="td-link" href="{{ route('article.show', $article->id) }}">@lang('messages.view')</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection