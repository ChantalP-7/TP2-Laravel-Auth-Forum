@extends('layouts.layout')
@section('title', 'Villes')
@section('content')
 <h3 class="amita-regular">Liste des villes</h3>
 <br />
 <div class="row">
    @forelse($villes as $ville)
    <div class="col-md-4 border-0">
        <div class="card mb-4 border-0">
            <div class="card-header bg-white  border-0 rounded-0 pt-2 pb-0">
                <h5 class="card-title klee-one-bold  fs-5">{{$ville->id}} - {{$ville->ville}}</h5>
            </div>  
        <br >
        </div>
        
    </div>
    
    @empty
        <div class="alert alert-danger"> Il n'y a pas de ville !</div>
    @endforelse
 </div>
@endsection('content')