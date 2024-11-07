@extends('layouts.gestor-master')
@section('content')


<link rel="stylesheet" href="/css/formador-dashboard.css"> 


<link rel="stylesheet" href="/css/calendario.css">

<div class="container-page" style="max-width:100%">

    <input type="hidden" name="id" value="{{ $turma->id }}" id="">

    <h1>Horário</h1>
    <h2> Turma de {{ $turma->nomeCurso }}</h2>

    <br>

    <div class="row row-filter" style="--bs-gutter-x: 0">

        <div class="form-group" style="max-width: 23%">
            <select class="form-control" id="area" name="area" style="width: 95%">
                <option value="" selected>Módulo</option>
                <option>Algoritmia</option>

            </select>
        </div>

        <div class="form-group" style="max-width: 23%">
            <select class="form-control" id="localidade" name="localidade" style="width: 95%">
                <option value="" selected>Formador</option>
                <option>Vitor</option>

            </select>
        </div>


        <div class="form-group filter-form" style="max-width: 8%">
            <button type="submit" class="btn btn-primary-purple">Filtar</button>
        </div>

        <div class="container" style="right:0px;width:25%;margin-right:0">

            <a href="#" class="btn-delete" style="text-decoration:none">Limpar</a>

            <a class="btn-delete" style="text-decoration:none">
                <i class="bi bi-share "></i>
            </a>

            <a class="btn-delete" style="text-decoration:none">
                <i class="bi bi-printer "></i>
            </a>

        </div>
    </div>

    <br>

    <div class="container-left-elements d-flex justify-content-center" style="margin:auto">



        <div class="card">

            
                <div>
                    <a class="btn-primary-purple" style="text-decoration:none" href="{{ route('gestor.modulos') }}">Criar Módulo</a>


                </div>
                <br>

                <select >
                    @foreach ($modulos as $modulo)

                    <option>{{ $modulo->nome }}</option>

                    @endforeach

                </select>


        </div>
    </div>
    <!-- Calendário -->
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



</div>



@endsection