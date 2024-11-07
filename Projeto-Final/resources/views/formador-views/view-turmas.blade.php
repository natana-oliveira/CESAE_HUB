@extends('layouts.formador-master')
@section('content')
<link rel="stylesheet" href="/css/formador-dashboard.css"> 



<div class="container-page" style="height:72vh">

 <h1>Turmas</h1>
    <form method="GET" action="{{ route('turma.filter') }}">


        <div class="row row-filter" style="--bs-gutter-x: 0">
        
            <div class="form-group" style="max-width: 23%">
                <select class="form-control" id="area" name="area" style="width: 95%">
                    <option value="" selected>Área de Formação</option>
                    <option value="Development">Development</option>
                    <option value="Media Design">Media Design</option>
                    <option value="IT Network">IT Network</option>
                    <option value="People">People</option>
                </select>
            </div>

            <div class="form-group" style="max-width: 23%">
                <select class="form-control" id="localidade" name="localidade" style="width: 95%">
                    <option value="" selected>Localização</option>
                    <option>Aveiro</option>
                    <option>Braga</option>
                    <option>Coimbra</option>
                    <option>Espinho</option>
                    <option>Leça da Palmeira</option>
                    <option>Lisboa</option>
                    <option>Marco de Canaveses</option>
                    <option>Oliveira de Azeméis</option>
                    <option>Porto</option>
                    <option>São João da Madeira</option>
                    <option>Vila do Conde</option>
                    <option>Viseu</option>
                </select>
            </div>

            <div class="form-group filter-form" style="max-width: 24%">

                <select class="form-control" name="nome" id="nome" style="width: 95%">
                    <option selected>Todos os cursos</option>
                    @foreach($turmas as $turma)
                    <option>{{ $turma->nomeCurso }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group filter-form" style="max-width: 8%">
                <button type="submit" class="btn btn-primary-purple">Filtar</button>
            </div>
        </div>

    </form>
    <br>

    @if($turmas->isNotEmpty())
    <div class="row">
        @foreach($turmas as $turma)
        <div class="col-3">


            <a class="card-link">
                <div class="card h-100">
                    <div class="card-body">

                        <h5 class="card-title-content">{{ $turma->nomeCurso }}</h5>
                        <p>{{ $turma->localidade }}</p>
                        <br>
                        <p>Coordenador: {{ $turma->nomeGestor }} {{ $turma->ultimoNomeGestor }}</p>
                        <p><b># {{$turma->codigo }}</b></p>

                        <!-- Adicione mais informações da turma conforme necessário -->
                    </div>
                </div>
            </a>

        </div>@endforeach
        @else
        <!-- Caso contrário, exibe uma mensagem indicando que não há turmas disponíveis -->
        <p>Não há turmas disponíveis no momento.</p>
        @endif
    </div>

    <br>

</div>
@endsection