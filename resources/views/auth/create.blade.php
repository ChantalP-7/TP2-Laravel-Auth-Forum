@extends('layouts.app')
@section('title', @lang('Login'))
@section('content')
    <h1>Login</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('Login')</h5>
                    @if(!$errors->isEmpty())
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form method="post" class="mb-2">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">@lang('Courriel')</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">@lang('Mot de passe')</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">@lang('connexion')</button>
                        </div>
                    </form>
                    <a href="{{route('user.forgot')}}" >Forgot Password</a>            
                </div>
            </div>
        </div>
    </div>
@endsection('content')