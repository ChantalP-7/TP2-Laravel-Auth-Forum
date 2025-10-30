@extends('layouts.layout')
@section('title', 'Utilisateur')
@section('content')
    <h4>@lang('messages.details_user') : <em>{{ $user->name }}</em></h4>
    <hr class="w-50">
    @if($etudiant)
        <h5 class="fst-italic text-decoration-underline mb-3">@lang('messages.student_assoc')</h5>        
        <p><strong>@lang('Name') :</strong> {{ $etudiant->nom }}</p>
        <p><strong>@lang('Address') :</strong> {{ $etudiant->adresse }}</p>
        <p><strong>@lang('Phone') :</strong> {{ $etudiant->telephone }}</p>
        <p><strong>@lang('Birthday') :</strong> {{ $etudiant->dateNaissance }}</p>
        <p><strong>@lang('Email') :</strong> {{ $etudiant->courriel }}</p>
        <p><strong>@lang('City') :</strong> {{ $etudiant->ville->ville ?? 'Non renseignée' }}</p>
    @else
        <p>Aucun étudiant associé à cet utilisateur.</p>
    @endif
    <hr class="w-50">
    <a href="{{ route('user.index') }}">@lang('messages.back_page')</a>
@endsection