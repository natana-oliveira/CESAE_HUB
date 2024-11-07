@extends('layouts.formador-master')
@section('content')
<link rel="stylesheet" href="/css/calendario.css">


<link rel="stylesheet" href="/css/formador-dashboard.css"> 


<div class="container-page">
  <div class="container-content d-flex justify-content-center">
    <div class="container-left-elements">
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <a class="card-link" href="{{ route('formadorTurmas.view') }}">
            <div class="card">
              <div class="icon-card" style="background-color: #AB87BC">
                <i class="bi bi-journal-code "></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">Visualizar Turmas</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a class="card-link" href="{{ route('formadorPerfil.view') }}">
            <div class="card">
              <div class="icon-card" style="background-color: #31AAE1">
                <i class="bi bi-people "></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">Perfil</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a class="card-link" href="">
            <div class="card">
              <div class="icon-card" style="background-color: #E5047E">
                <i class="bi bi-calendar "></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">Calendário</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a class="card-link" href="{{ route('formadorDisponibilidades.view') }}">
            <div class="card">
              <div class="icon-card" style="background-color: #362664  ">
                <i class="bi bi-pencil-square"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">Editar Disponibilidades</h5>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<input type="hidden" value="{{ $disponibilidades }} " id="disp">



<div class="container-page d-flex justify-content-center">

  <div id="container-calendar">
    <div id="header">
      <div id="monthDisplay"></div>

      <div>
        <button id="backButton">&#8249;</button>
        <button id="nextButton">&#8250;</button>
      </div>

    </div>

    <div id="weekdays"> <!-- alinhar com as colunhas -->
      <div>Domingo</div>
      <div>Segunda-feira</div>
      <div>Terça-feira</div>
      <div>Quarta-feira</div>
      <div>Quinta-feira</div>
      <div>Sexta-feira</div>
      <div>Sábado</div>
    </div>


    <!-- div dinamic -->
    <div id="calendar"></div>


    <div id="deleteEventModal">
      <h2>Editar/Apagar Disponibilidade</h2>

      <div id="eventText"></div><br>


      <button id="deleteButton">Apagar</button>
      <button id="closeButton">Fechar</button>
    </div>

    <script src="{{ asset('/js/calendario.js') }}"></script>
  </div>
</div>

<br><br>
</div>



@endsection