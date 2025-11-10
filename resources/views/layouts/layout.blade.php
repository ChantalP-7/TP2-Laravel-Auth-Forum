<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Fait par Chantal Pépin dans le cadre du cours Cadriciel, 4e session, Collège Maisonneuve">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" />  
</head>
<body class="d-flex flex-column min-vh-100">
    @php $locale = session()->get('locale') @endphp
    <header class="mb-5 jus background pl-5 pr-5">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid gx-5">
                <!--<a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>--> 
                <div class="d-flex justify-content-start align-items-center mx-5">               
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('images/Logo-hibou-bg-transparent.png') }}" width="50" height="50" alt="Logo hibou">                    
                    </a>
                    <h3 class="text-white text-nowrap fs-4">@lang('Titles.Les petits savants')</h3>
                </div>                                
                <div class="collapse navbar-collapse  w-100 d-flex justify-content-between px-3 align-items-center" id="navbarSupportedContent">
                @auth
                <ul class="navbar-nav gap-3 pl-5 mb-lg-0">
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="nav-link dropdown-toggle text-white fs-4 " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" color="#fff"><path d="M0 0h24v24H0z" fill="none"></path><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"></path></svg>
                        @lang('Articles')
                        </a>    
                        <ul class="dropdown-menu">                       
                            <li><a class="dropdown-item fs-5" href="{{ route('article.index') }}">@lang('Articles')</a></li>
                            
                            <li><a class="dropdown-item fs-5" href="{{ route('article.create') }}">@lang('Add_Article')</a></li>
                            
                        </ul>
                    </li>        
                </ul>
                @endauth
                </div>
                <div class="collapse navbar-collapse" id="navbarsExample03">                    
                    <ul class="navbar-nav  mb-2 mb-sm-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fs-5 text-white" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">@lang('Language') {{ $locale === '' ? "(en)" : "($locale)"}}</a>
                            <ul class="dropdown-menu"> 
                                <li><a class="dropdown-item nav-link fs-5 " href="{{route('lang', 'en')}}">@lang('English')</a></li>
                                <li><a class="dropdown-item nav-link fs-5 " href="{{route('lang', 'fr')}}">@lang('French')</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            @guest
                            <a class="nav-link fs-5 text-white" href="{{route('etudiant.create')}}">@lang('Registration')</a>
                            <a class="nav-link fs-5 text-white" href="{{route('login')}}">@lang('Login')</a>
                            @else
                            <a class="nav-link fs-5 text-white" href="{{route('logout')}}">@lang('Logout')</a>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        
    <div class="container">
         @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                 {{ session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

         @auth
            <p>@lang('messages.Welcome'), {{ Auth::user()->name }}</p>
        @else
            <p class="fs-5">@lang('auth.log')</p>
        @endauth
        @yield('content')
    </div>
    </main>
    <footer class="footer mt-auto py-3   background text-white">
        <div class="container text-center">
            &copy; {{ date('Y') }} {{ config('app.name') }} | Conception: Chantal Pépin
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</html>