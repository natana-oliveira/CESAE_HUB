@extends('layouts.formador-master')
@section('content')
<link rel="stylesheet" href="/css/formador-dashboard.css"> 


<div class="container-page">



    <h1>Perfil de {{ $formador->nome }} {{ $formador->ultimoNome }} </h1>

    <input type="hidden" name="id" value="{{ Auth::user ()->id}}" id="">

    <!-- Mensagem
    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif -->

    <br>
   
    <div class="row text-end" >

        <div >
            <a href="{{ route('formadorEditarPerfil.view') }}" style="color:purple;margin-right:5px">
                <i class="bi bi-pencil"></i>
                Editar Perfil
            </a>

            <a href="{{ route('formadorEditarPerfilProfissional.view') }}" style="color:purple;">
                <i class="bi bi-pencil"></i>
                Editar Perfil Profissional
            </a>
        </div>
    </div>


<br><br>



    <div class="row">



        <div class="col-6">
            <a class="card-link">
                <div class="card h-100">
                    <div class="icon-card" style="background-color: #AB87BC">
                        <img width="100px" height="100px" style="border-radius: 50px;"
                            src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('imagens/nophoto.jpg') }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title-content">{{ $formador->nome }} {{ $formador->ultimoNome }}</h5>
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

                        <p>#{{$formador->area}}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">

            <a class="card-link" href="">
                <div class="card h-100">

                    <div class="card-body" style="color:black;">
                        <h5 class="card-title-content">Regime</h5>
                        <p>#{{$formador->regime}}</p>

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
                    <p>#{{$formador->nomeModulos}}</p>

                </div>

            </div>
        </div>
    </a>


<br>



    <a class="card-link" href="">
        <div class="card-content">

            <div class="card-body">
                <h5 class="card-title-content">Cursos</h5>
                <br>
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">Curso</th>
                            <th scope="col">Modulo</th>
                            <th scope="col">Localidade</th>
                            <th scope="col">Regime</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- fazer for each -->

                        <tr>
                            <td>{{$formador->nomeCurso}}</td>
                            <td>{{$formador->nomeModulos}}</td>
                            <td>{{$formador->localidadeCurso}}</td>
                            <td>{{$formador->regimeCurso}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </a>


</div>

@endsection