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
                <ul class="navbar-nav gap-3 pl-5 mb-lg-0">
                    @auth
                    <li class="nav-item d-flex align-items-center">                      
                     <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-house-heart" viewBox="0 0 16 16">
                      <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982"/>
                      <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                    </svg>   
                    <a class="nav-link active text-white fs-4" aria-current="page" href="{{route('etudiant.index')}}">@lang('Admin')</a> 
                    
                                       
                    </li>
                    @endauth
                    @auth
                    <li class="nav-item d-flex align-items-center">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" color="#fff"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <a class="nav-link active text-white fs-4" href="{{ route('user.index') }}">@lang('Users')</a>
                    </li>
                    @endauth
                    @auth
                    <li class="nav-item dropdown d-flex align-items-center">
                      <a class="nav-link dropdown-toggle text-white fs-4 " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-backpack pb-1" viewBox="0 0 16 16">
                        <path d="M4.04 7.43a4 4 0 0 1 7.92 0 .5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z"/>
                        <path d="M6 2.341V2a2 2 0 1 1 4 0v.341c2.33.824 4 3.047 4 5.659v5.5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5V8a6 6 0 0 1 4-5.659M7 2v.083a6 6 0 0 1 2 0V2a1 1 0 0 0-2 0m1 1a5 5 0 0 0-5 5v5.5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5V8a5 5 0 0 0-5-5"/>
                      </svg>
                          @lang('Students')
                      </a>
                       @endauth
                    <ul class="dropdown-menu">
                        @auth
                        <li><a class="dropdown-item fs-5" href="{{ route('etudiant.create') }}">@lang('Add_Student')</a></li>
                       
                        <li><a class="dropdown-item fs-5" href="{{route('ville.index')}}">@lang('Cities_List')</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item fs-5" href="#">@lang('Archives')</a></li>
                        @endauth
                    </ul>
                     
                    </li>        
                </ul>
                
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
        
    <div class="container flex-grow-1">
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