@extends('layouts.layout')

@section('title', 'Users')

@section('content')
    <h2 class="text-center mb-5">@lang('messages.Articles_List')</h2>  
    <table>
        <thead>
            <tr>
                <th>@lang('Titles.Title', ['Title'])</th>
                <th>@lang('Category', ['Category'])</th>
                <th>@lang('Actions')</th>
            </tr>
        </thead>
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

    <br>

    <!-- Si articles est paginé, afficher la pagination -->
    {{ $articles->links() }}
@endsection
