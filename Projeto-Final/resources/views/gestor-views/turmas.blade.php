@extends('layouts.gestor-master')
@section('content')

<link rel="stylesheet" href="/css/gestor.css">




    <div class="container-page" style="max-width:100%">

        <div class="row row-filter" style="--bs-gutter-x: 0">
 
 
            <h1>Turmas</h1>
 
            <div class="form-group filter-form" style="max-width: 24%">
 
                <select class="form-control" name="area" id="area" style="width: 95%">
                    <option selected>Área de formação</option>
                   
 
                    <option>IT NETWORKS</option>
                   
                </select>
            </div>
 
 
            <div class="form-group filter-form" style="max-width: 24%">
 
                <select class="form-control" name="area" id="area" style="width: 95%">
                    <option selected>Localização</option>
 
                    
                </select>
            </div>
 
            <div class="form-group filter-form" style="max-width: 24%">
 
                <select class="form-control" name="area" id="area" style="width: 95%">
                    <option selected>Todos os cursos</option>
                   
 
                </select>
            </div>
            <div class="form-group filter-form" style="max-width: 8%">
            <button type="submit" class="btn btn-primary-purple">Filtar</button>
        </div>
        </div>

<!-- Botão para adicionar Turma -->
        <div class="text-right mb-3">
            <button class=" btn-primary-purple"> <a href="{{ route('gestor.addturmas') }}" style="text-decoration:none;color:white;">Adicionar Turma</a>
        </div>


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
