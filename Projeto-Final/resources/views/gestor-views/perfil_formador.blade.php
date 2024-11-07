@extends('layouts.gestor-master')
@section('content')
    <link rel="stylesheet" href="/css/formador-dashboard.css">
    <link rel="stylesheet" href="/css/calendario.css">

    <div class="container-page">



        {{-- <h1>Perfil de {{ $formador->nome }} {{ $formador->ultimoNome }} </h1> --}}

        <input type="hidden" name="id" value="{{ $formador->id }}" id="">


        <!-- Mensagem
                    @if (session('message'))
    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
    @endif -->

        <br>




        <br><br>



        <div class="row">



            <div class="col-6">
                <a class="card-link">
                    <div class="card h-100">
                        <div class="icon-card" style="background-color: #AB87BC">
                            <img width="100px" height="100px" style="border-radius: 50px;"
                                src="{{  $formador->photoFormador ? asset('storage/' .  $formador->photoFormador) : asset('imagens/nophoto.jpg') }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title-content">{{ $formador->nomeFormador }} {{ $formador->ultimoNomeFormador }}</h5>
                            <p>{{ $formador->email }}</p>
                            <p>{{ $formador->contacto }}</p>
                            <p>{{ $formador->localidade }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a class="card-link" href="">
                    <div class="card h-100">

                        <div class="card-body" style="color:black;">
                            <h5 class="card-title-content">Áreas de atuação</h5>

                            <p>#{{ $formador->area }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3">

                <a class="card-link" href="">
                    <div class="card h-100">

                        <div class="card-body" style="color:black;">
                            <h5 class="card-title-content">Regime</h5>
                            <p>#{{ $formador->regime }}</p>

                        </div>
                    </div>
                </a>

            </div>
        </div>

        <br>

        <a class="card-link" href="">
            <div class="card-content">

                <div class="card-body" style="color:black;">
                    <h5 class="card-title-content">Módulos</h5>

                    <div class="col-3">
                        <p>#{{ $formador->nomeModulos }}</p>

                    </div>

                </div>
            </div>
        </a>


        <br>

        <div class="container-content-divs">

<div>
    <p>Manha
        <svg width="40" height="15" xmlns="http://www.w3.org/2000/svg">
            <rect width="200" height="100" fill="#A0AADF" />
        </svg>
    </p>
</div>
<div>
    <p>Tarde
        <svg width="40" height="15" xmlns="http://www.w3.org/2000/svg">
            <rect width="200" height="100" fill="#8CC7BF" />
        </svg>
    </p>
</div>

<div>
    <p>Dia todo
        <svg width="40" height="15" xmlns="http://www.w3.org/2000/svg">
            <rect width="200" height="100" fill="#AEECAA" />
        </svg>
    </p>
</div>
<div>
    <p>Indisponivel
        <svg width="40" height="15" xmlns="http://www.w3.org/2000/svg">
            <rect width="200" height="100" fill="#EE6B6E" />
        </svg>
    </p>
</div>
<div>
    <p>Ferias/Feriado
        <svg width="40" height="15" xmlns="http://www.w3.org/2000/svg">
            <rect width="200" height="100" fill="#717171" />
        </svg>
    </p>
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
        @endsection
