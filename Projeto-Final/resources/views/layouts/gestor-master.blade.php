<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>CESAE Hub</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="/CSS/gestor.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,400;0,6..12,600;0,6..12,700;1,6..12,400;1,6..12,600;1,6..12,700&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="content-page">
         <!-- SIDE BAR -->
         <div class="sidebar">
            <div class="logo-sidebar">
               <a class="logo" href="{{route('gestor.view')}}"><img src="{{ asset('imagens/logo.png') }}" width="75%" alt=""></a>
             </div>
            <div class="side-links">
              <div class="top-bar">
               <div class="link-menu @if (Route::currentRouteName() == 'gestor.view') active @endif">
                  <a href="{{route('gestor.view')}}"><i class="bi bi-grid"></i>Dashboard</a>

               </div>
               <div class="link-menu @if (Route::currentRouteName() == 'gestorPerfil.view' || Route::currentRouteName() == 'gestorEditarPerfil.view' || Route::currentRouteName() == 'gestorEditarPerfilProfissional.view') active @endif"><a href="{{ route('gestorPerfil.view') }}"><i class="bi bi-person"></i>Perfil</a>
               </div>
               <div class="link-menu @if (Route::currentRouteName() == 'gestor.formadores') active @endif">
                  <a href="{{route('gestor.formadores')}}"><i class="bi bi-people"></i>Formadores</a>
               </div>
               <div class="link-menu @if (Route::currentRouteName() == 'gestor.turmas') active @endif">
                  <a href="{{route('gestor.turmas')}}"><i class="bi bi-journal-code"></i>Turmas</a>
               </div>
               <div class="link-menu @if (Route::currentRouteName() == 'gestor.unidades') active @endif">
                  <a href="{{route('gestor.unidades')}}"><i class="bi bi-geo-alt"></i>Unidades</a>
               </div>
               <div class="link-menu @if (Route::currentRouteName() == 'gestor.horarios') active @endif">
                  <a href="{{route('gestor.horarios')}}"><i class="bi bi-clock"></i>Horários</a>
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
            <!-- NAV BAR RESPONSIVE--> 
            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                  <div class="search-section">
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input class="form-control search-box" type="search" placeholder="Search" aria-label="Search">
                      </div>
                  </div>
                  <div class="right-elements">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <div class="icons-group">
                          <a class="icon-navbar" href=""><i class="bi bi-lightbulb"></i></a>
                          <a class="icon-navbar" href=""><i class="bi bi-bell"></i></a> 
                          <a class="icon-navbar" href=""><i class="bi bi-gear"></i></a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <div class="id-menu">
                          <div class="photo-perfil">
                            <img width="50px" height="50px" style="border-radius: 50px;" src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('imagens/nophoto.jpg') }}"></div>
                          <div class="identification">
                            <p class="nome-id">{{ Auth::user ()->nome}} {{ Auth::user ()->ultimoNome}}</p>
                            <p class="user-id">Gestor</p>
                          </div>
                          <div class="dropdown dropstart ">
                            <a class="btn btn-drop dropstart" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-chevron-down"></i></a>
                            <ul class="dropdown-menu dropbox" aria-labelledby="dropdownMenuButton1">
                              <li><p> {{ Auth::user ()->email}}</p></li>
                              <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li><button type="submit" class="dropdown-item">Sair</button></li>
                              </form>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>

                  </div>
                </div>
              </div>
            </nav>  
          @yield('content')
        </div>
        </div>
        <footer></footer>
        </body>
        </html>