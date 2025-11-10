@extends('layouts.layout')
@section('title', trans('lang.text_welcome'))
@section('content')
<div class="container">
    <div class="row  justify-content-center my-5">
        <h3 class="text-center amita-regular">@lang('messages.Welcome_to_forum')</h3>       
        @guest
        <div class="flex justity-center gap-2">
        <a class="btn btn-jade nav-link mt-3 fs-5 text-white" href="{{route('user.create')}}">@lang('Registration')</a>
        <a class="btn btn-jade nav-link mt-3 fs-5 text-white" href="{{route('login')}}">@lang('Login')</a>
        </div>
        @endguest
    </div>

</div>
@endsection