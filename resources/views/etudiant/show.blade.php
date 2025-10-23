@extends('layouts.layout')
@section('title', 'Etudiants')
@section('content')
 
 <div class="row justify-content-center">
   <h3 class="mt-2 mb-5 text-center amita-regular">Profil étudiant</h3> 
    <div class="col-md-6">              
        <div class="card mb-4 border-0">
            <div class="card-header text-white background-title rounded-0 pt-2 mb-4  pb-0">
                <h5 class="card-title klee-one-regular fs-4">{{ $etudiant->nom }}</h5>
            </div>
            <div class="card-body border-0 ">
                <p class="card-text fs-5"><strong>Adresse :</strong> {{ $etudiant->adresse  }}</p>
                <p class="card-text fs-5"><strong>Ville :</strong> {{ $etudiant->ville->ville  }}</p>
                <p class="card-text fs-5"><strong>Téléphone :</strong> {{ $etudiant->telephone  }}</p>                
                <p class="card-text fs-5"><strong>Date de naissance :</strong> {{ $etudiant->dateNaissance  }}</p>                
                <p class="card-text fs-5"><strong>Courriel :</strong> <a class="cursor-pointer"> {{ $etudiant->courriel  }}</a></p>
                
            </div>
            <div class="card-footer bg-white border-0 rounded mt-3 mb-5">
                <div class="d-flex justify-content-between mb-5">
                   <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-sm background-soft align-center fs-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-pencil-square py-0 px-1" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>                                            
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm redTomato align-center fs-5" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-trash3  py-0 px-1" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                    </button>                    
                </div>
                <hr class="mt-2 mb-4" />
                <a href="{{ route('etudiant.index') }}" class="col-md-3 btn fw-bold text-decoration-underline text-primary p-3 bg-blue text-white">
                ← Retour à la liste
            </a>  
            </div> 
                     
        </div>
        
    </div>

 </div>

 <!-- modal -->



<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModalLabel">Supprimer</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Annuler"></button>
        </div>
        <div class="modal-body">
            Es-tu sûr.e de vouloir supprimer l'étudiant : <strong> {{$etudiant->nom}}</strong>?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <form method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Supprimer" class="btn btn-danger">
            </form>
        </div>
        </div>
    </div>
</div>

@endsection('content')