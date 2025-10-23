@extends('layouts.layout')
@section('title', 'Bienvenue')
@section('content')
<div class="container">
    <div class="row  justify-content-center my-5">
                <h3 class="text-center amita-regular">Bienvenue dans l'admin</h3>
                <a class="text-center text-bold fs-3" href="{{ route('etudiant.index')}}">Liste des étudiants</a>
    </div>

</div>
@endsection('content')