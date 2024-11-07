@extends('layouts.formador-master')
@section('content')

<link rel="stylesheet" href="/css/calendario.css">

<link rel="stylesheet" href="/css/formador-dashboard.css"> 


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

<input type="hidden" value="{{ Auth::user ()->id}}" id="userId">


<div class="container-page">

    <h1>Disponibilidade</h1>

    <br>

    <h6>* Assinale os dias e periodos utilizando as cores correspondentes a disponibilidade</h6>
    
    <div class="container" style="right:0px;width:25%;margin-right:0">
        <button href="#" class="btn-delete">Limpar</button>

        <button class="btn-delete">
            <i class="bi bi-share "></i>
        </button>

        <button class="btn-delete">
            <i class="bi bi-printer "></i>
        </button>

    </div>
    <br>


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
    <br>

    <input type="hidden" value="{{ $disponibilidades }} " id="disp">

    <div class="container" onclick="closeModal()" style="margin-left:20%">


        <div id="container-calendar">
            <div id="header">
                <div id="monthDisplay"></div>

                <div>
                    <button id="backButton"><i class="bi bi-arrow-left"></i></button>
                    <button id="nextButton"><i class="bi bi-arrow-right"></i></button>
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


        </div>

        <ul id="novaDisponibilidadeMenu">
            <h5><i class="bi bi-palette"></i> Marcar</h5>

            <li class="manha" onclick="clickModalMenu('manha')">Manha</li>
            <li class="tarde" onclick="clickModalMenu('tarde')">Tarde</li>
            <li class="dia-todo" onclick="clickModalMenu('dia-todo')">Dia Todo</li>
            <li class="indisponivel" onclick="clickModalMenu('indisponivel')">Indisponivel</li>
            <li class="ferias" onclick="clickModalMenu('ferias')">Ferias/Feriado</li>
            <!-- <input id="eventTitleInput" placeholder="Periodo" />

        <button id="saveButton">Guardar</button>
        <button id="cancelButton">Cancelar</button> -->
        </ul>

        <br>

        @csrf
        <a onclick="saveDisponibilidades()" class="btn-primary-purple" style="text-decoration:none;"
            id="saveButtonDisponibilidade" action="{{route('formadorDisponibilidades.add')}}">Guardar</a>


        <div id="deleteEventModal">
            <h2>Editar/Apagar Disponibilidade</h2>

            <div id="eventText"></div><br>


            <button id="deleteButton">Apagar</button>
            <button id="closeButton">Fechar</button>
        </div>

        <!-- <div id="modalBackDrop"></div> -->

        <br><br>



        <script src="{{ asset('/js/calendario.js') }}"></script>

    </div>
    <br>
</div>
@endsection