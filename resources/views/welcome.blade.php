@extends('layouts.layout')
@section('title', trans('lang.text_welcome'))
@section('content')
<div class="container">
    <div class="row  justify-content-center my-5">
        <h3 class="text-center amita-regular">@lang('messages.Welcome_to_admin')</h3>
        @auth
        <a class="text-center text-bold fs-3" href="{{ route('etudiant.index')}}">@lang('messages.Students_List')</a>
        @endauth
            @guest
        <a class="btn btn-jade nav-link mt-3 fs-5 text-white" href="{{route('login')}}">@lang('Login')</a>
        @endguest
    </div>

</div>
@endsection('content')