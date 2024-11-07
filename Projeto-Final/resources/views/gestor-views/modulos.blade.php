@extends('layouts.gestor-master')
@section('content')

<div class="container-page">

<h2>Módulos</h2>
<br>

<a class="btn btn-primary-purple" style="margin-bottom: 30px" href="{{ route('modulo.add') }}">Criar Módulo</a>



@if($modulos->isNotEmpty())
    <div class="row">
        
        @foreach($modulos as $modulo)
        <div class="col-3" style="margin-bottom: 30px">
 
        
 
            <a class="card-link">
                <div class="card h-100">
                    <div class="card-body" style="color:black">
 
                        <h5 class="card-title-content"  style="color:black">{{ $modulo->nome }}</h5>
                        <p  style="color:black">Número de Horas:{{ $modulo->nr_horas }}</p>
                        <a class="btn btn-primary-purple" href="{{route('modulo.view',$modulo->id)}}"><i class="bi bi-pencil"></i></a>
                        <a class="btn btn-primary-purple" href="{{route('modulo.delete',$modulo->id)}}"><i class="bi bi-trash3"></i></a>


                        
 
                        <!-- Adicione mais informações da turma conforme necessário -->
                    </div>
                </div>
            </a>
 
        </div>@endforeach
        @else
        <!-- Caso contrário, exibe uma mensagem indicando que não há turmas disponíveis -->
        <p>Não há módulos disponíveis no momento.</p>
        @endif

       



        
@endsection