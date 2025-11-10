@extends('layouts.layout')
@section('title', 'Registration')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="card-title mt-3 mb-3">@lang('Registration')</h3>
            <div class="card mb-5">
                <div class="card-header">
                    <h5 class="card-title">@lang('Registration')</h5>
                </div>
                @if(isset($errors) && $errors->any())
                    <div class="alert text-danger fw-bold fs-4">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <form action="" class="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" <!--value="{{old('password')}}"--> <!-- Option du développeur : Obliger l'utilisateur de remettre son mot de passe pour sécurité, donc pas de value old etc.-->
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn-jade">Save</button>
                        </div>
                    </form>              
                </div>
            </div>
        </div>
    </div>
@endsection('content')