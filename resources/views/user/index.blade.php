@extends('layouts.layout')
@section('title', 'Users')
@section('content')
    <h2 class="text-center">@lang('Users_List')</h2>    
    <table>
        <thead>
            <tr>
                <th></th>
                <th>@lang('Titles.Name', ['Nom'])</th>
                <th>@lang('Titles.Email', ['Courriel'])</th>
                <th>@lang('Titles.Student', ['Étudiant'])</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <div class="grille">
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>@lang('messages.student_name', ['nom' => $user->etudiant->nom])</td>
                    <td>@lang('messages.email', ['courriel' => $user->etudiant->courriel])</td>
                    <td>
                        @if($user->etudiant)
                            {{ $user->etudiant->nom }}
                        @else
                            @lang('messages.no_student') <!-- Utilisation de la clé de traduction -->
                        @endif
                    </td>
                    <td class="">
                        <a class="td-link" href="{{ route('user.show', $user->id) }}">@lang('messages.view')</a>
                    </td>
                </tr>
            @endforeach
            </div>
        </tbody>
    </table>
    <br>
    {{ $users }}
 <br/>
@endsection