@extends('layouts.layout')
@section('title', 'Users')
@section('content')
    <h2 class="text-center">@lang('Articles_List')</h2>    
    <table>
        <thead>
            <tr>
                <th></th>
                <th>@lang('Titles.Title', ['Title'])</th>
                <th>@lang('Titles.Content', ['Content'])</th>
                <th>@lang('Category', ['Category'])</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <div class="">
            @foreach($articles as $article)
                <tr>                    
                    <td>{{ $article->getTranslation('title', app()->getLocale()) }}</td>
                    <td>{{ $article->getTranslation('content', app()->getLocale()) }}</td>
                    <td>{{ $article->category->getTranslation('category', app()->getLocale()) }}</td>
                    <td class="">
                        <a class="td-link" href="{{ route('article.show', $article->id) }}">@lang('messages.view')</a>
                    </td>
                </tr>
            @endforeach
            </div>
        </tbody>
    </table>
    <br>
    {{ $articles }}
 <br/>
@endsection