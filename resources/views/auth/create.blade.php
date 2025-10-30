@extends('layouts.layout')
@section('title', 'Login')
@section('content')
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <div class="card mb-5">
                <div class="card-header bg-jade">
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
                <div class="card-body ">
                    <form method="post" class="mb-2">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">@lang('Email')</label>
                            <input type="email" class="form-control" id="username" name="username" value="{{old('username')}}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">@lang('Password')</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-jade mx-0 text-white fs-5">@lang('Login')</button>
                        </div>
                    </form>
                         
                </div>
            </div>
        </div>
    </div>
@endsection('content')