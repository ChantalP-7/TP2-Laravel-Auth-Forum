@extends('layouts.layout')
@section('title', 'Ajout étudiant')
@section('content')
<h3 class="mb-4 text-center"><strong>Ajoute un étudiant</strong></h3>

@if(isset($errors) && $errors->any())
    <div class="alert text-danger fw-bold fs-4">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    
    <div class="row justify-content-center mt-5 mb-5">        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header background-soft text-white">
                    <h5 class="card-title fs-4"><strong>Nouvel étudiant</strong></h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('etudiant.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label"><strong>Nom</strong></label>
                            <input type="text" class="form-control" id="nom" name="nom"  value="{{ old('nom') }}">
                        </div>
                         @if ($errors->has('nom'))
                            <div class="text-danger mb-2">
                                {{$errors->first('nom')}}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="adresse" class="form-label"><strong>Adresse</strong></label>
                            <input type="text" class="form-control" id="adresse" name="adresse"   value="{{ old('adresse') }}">
                        </div>
                        @if ($errors->has('adresse'))
                            <div class="text-danger mb-2">
                                {{$errors->first('adresse')}}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="telephone" class="form-label"><strong>Téléphone</strong></label>
                            <input type="text" class="form-control" id="telephone" name="telephone"   value="{{ old('telephone') }}">
                        </div>
                        @if ($errors->has('telephone'))
                            <div class="text-danger mb-2">
                                {{$errors->first('telephone')}}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="dateNaissance" class="form-label"><strong>Date de naissance</strong></label>
                            <input type="date" class="form-control" id="dateNaissance" name="dateNaissance"   value="{{ old('dateNaissance') }}">
                        </div>
                        @if ($errors->has('dateNaissance'))
                            <div class="text-danger mt-2">
                                {{$errors->first('dateNaissance')}}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="courriel" class="form-label"><strong>Courriel</strong></label>
                            <input type="email" class="form-control" id="courriel" name="courriel"   value="{{ old('courriel') }}">
                        </div>
                        @if ($errors->has('courriel'))
                            <div class="text-danger mb-2">
                                {{$errors->first('courriel')}}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="ville_id" class="form-select-label mb-2"><strong>Villes</strong></label>
                            <select name="ville_id" id="ville_id" class="form-select">
                                <option value="">Selectionne une ville</option>
                                @foreach($villes as $ville) 
                                <option value="{{ $ville->id }}" {{ old('ville_id') == $ville->id ? 'selected' : '' }}>{{ $ville->ville }}
                                </option>
                                @endforeach
                            </select>
                        </div> 
                        @if ($errors->has('ville_id'))
                            <div class="text-danger mb-2">
                                {{$errors->first('ville_id')}}
                            </div>
                        @endif                      
                        <br/>
                        <button type="submit" class="btn background-soft"><strong>Sauvegarder</strong></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection