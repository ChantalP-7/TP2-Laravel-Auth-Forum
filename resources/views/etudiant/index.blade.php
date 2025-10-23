@extends('layouts.layout')
@section('title', 'Étudiants')
@section('content')
 <h3 class="amita-regular text-center mb-5">Liste des étudiants</h3>
 <br />
 <div class="row">
    @forelse($etudiants as $etudiant)
    <div class="col-md-4 border-0 gx-5" >
        <div class="card mb-4 border-0">
            <div class="card-header background-title  border-0 rounded-0 pt-2 pb-0">
                <h5 class="card-title fs-4">{{$etudiant->nom}}</h5>
            </div>
            <div class="card-body">               
                <p class="card-text "><strong>Date de naissance :</strong> {{ $etudiant->dateNaissance  }}</p>
                <p class="card-text "><strong>Ville :</strong> {{ $etudiant->ville->ville  }}</p>
            </div>
            <div class="card-footer mb-5 border-0 bg-white">
                <div class="d-flex justify-content-start gap-5 ">                    
                    <a href="{{ route('etudiant.show', $etudiant->id)}}" class="btn btn-sm btn-special">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                    </a>
                </div>
            </div>
        </div>        
    </div>
    <br>
    @empty
        <div class="alert alert-danger"> Il n'y a pas d'étudiant !</div>
    @endforelse
 </div>
 {{ $etudiants }}
 <br/>
@endsection('content')