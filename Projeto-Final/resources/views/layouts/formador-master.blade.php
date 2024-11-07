<!DOCTYPE html>

<html lang="en">

<head> 
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CESAE Hub</title>  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
  <link rel="stylesheet" href="/css/formador-master.css"> 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"
    defer></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,400;0,6..12,600;0,6..12,700;1,6..12,400;1,6..12,600;1,6..12,700&display=swap"
    rel="stylesheet">

</head>

<body>


  <div class="content-page">
    <!-- SIDE BAR -->
    <div class="sidebar">
      <div class="logo-sidebar">
        <a class="logo" href="{{route('dashboard.view')}}"><img src="{{ asset('imagens/logo.png') }}" width="75%"
            alt=""></a>
      </div>
      <div class="side-links">
        <div class="top-bar"> 
          <div class="link-menu @if (Route::currentRouteName() == 'dashboard.view') active @endif">
            <a href="{{route('dashboard.view')}}"><i class="bi bi-grid"></i>Dashboard</a>
          </div>
          <div
            class="link-menu @if (Route::currentRouteName() == 'formadorPerfil.view' || Route::currentRouteName() == 'formadorEditarPerfil.view' || Route::currentRouteName() == 'formadorEditarPerfilProfissional.view') active @endif">
            <a href="{{ route('formadorPerfil.view') }}"><i class="bi bi-person"></i>Perfil</a>
          </div>
          <div class="link-menu @if (Route::currentRouteName() == 'formadorTurmas.view') active @endif">
            <a href="{{ route('formadorTurmas.view') }}"><i class="bi bi-journal-code"></i>Turmas</a>
          </div>
          <div class="link-menu @if (Route::currentRouteName() == 'formadorDisponibilidades.view') active @endif">
            <a href="{{ route('formadorDisponibilidades.view') }}"><i class="bi bi-clock"></i>Agenda</a>
          </div>
          <div class="link-menu">
            <a href=""><i class="bi bi-calendar"></i>Calendário</a>
          </div>
          <div class="link-menu">
            <a href=""><i class="bi bi-chat"></i>Inbox</a>
          </div>
        </div>
        <div class="bottom-bar">
          <div class="link-menu">
            <a href=""><i class="bi bi-question-circle"></i>Help</a>
          </div>
        </div>
      </div>
    </div>

    <div class="right-group-elements">
      <!-- NAV BAR -->
      <div class="navbar">
        {{-- <div class="search-section">
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i>
              <input type="search" class="form-control search-box" placeholder="Search">
          </div></span>
        </div> --}}



        <div class="search-section">
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i>
            <input class="form-control search-box" type="search" placeholder="Search" aria-label="Search">
          
        </div></span>
      </div>

        <div class="right-elements">
          <div class="icons-group">
            <a class="icon-navbar" href=""><i class="bi bi-lightbulb"></i></a>
            <a class="icon-navbar" href=""><i class="bi bi-bell"></i></a>
            <a class="icon-navbar" href=""><i class="bi bi-gear"></i></a>
          </div>
          <div class="id-menu">
            <div class="photo-perfil"><img width="50px" height="50px" style="border-radius: 50px;"  
                            src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('imagens/nophoto.jpg') }}"></div>
            <div class="identification"> 
              <!-- <p class="nome-id">Vitor Santos</p> -->
              <p class="nome-id">{{ Auth::user ()->nome}} {{ Auth::user ()->ultimoNome}}</p>
              <p class="user-id">Formador</p>
            </div>
            <div class="dropdown dropstart ">
              <a class="btn btn-drop dropstart" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                  class="bi bi-chevron-down"></i>
              </a>
              <ul class="dropdown-menu dropbox" aria-labelledby="dropdownMenuButton1">
                <li>
                  <p> {{ Auth::user ()->email}}</p>
                </li>

                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <li><button type="submit" class="dropdown-item">Sair</button></li>
                </form>
                <!-- Link rota logout route('logout') -->
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- ***** bloco de conteúdo ***** -->

      <div class="container">
        @yield('content')
      </div>

      <!-- footer -->
      <footer></footer>

</body>

</html>