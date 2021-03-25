<style>
.navbar{
background-color: #868787
}
.nav-link{
color: #870404;
}
.navbar-brand{
color: white;
}

</style>



<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <title>LaravelProject</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      
    </head>
    <body>
        <header>
                        <nav class="navbar navbar-expand-lg">
                          
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                     <a class="navbar-brand font-weight-bold" href="/">
                      <img src="{{ URL::asset('/images/logo.png') }}" width="70" height="40" class="d-block"></img></a>
                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse" id="navbarText">
                                <ul class="navbar-nav mr-auto">
                                  <li class="nav-item active">
                                    @can('Admin')
                                    <a class="nav-link font-weight-bold" href="adminpage">Admin<span class="sr-only">(current)</span></a>
                                    @endcan
                                  </li>
                                  
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="{{ route('affichercour') }}">Cours</a>
                                  </li>
                                    
                                    <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="{{ route('afficherformation') }}">Formations</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="{{ route('afficheaffiche') }}">Affichages</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="{{ route('afficherevents') }}">Evénements</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="{{ route('affichernews') }}">Nouveautés</a>
                                  </li>

                                </ul>
                              </div>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right btn btn-outline-secondary" aria-labelledby="navbarDropdown">
                                    @can('Prof')
                                    <a class="dropdown-item" href="/dashboard">Tableau de bord</a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </nav>

            </header>
        <div class="flex-center position-ref full-height mt-3">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"></a>
                    @else
                        <a href="{{ route('login') }}"></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"></a>
                        @endif
                    @endauth
                </div>
            @endif

      <div class="container">
      @include('layouts.flash')
          
                @yield('contenu')
        </div>
            
        </div>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



        
    </body>
</html>