@extends('layouts.gestor-master')
@section('content')
<div class="container-page">
  <div class="top-page">
    <h1 class="">Perfil de {{ $gestor->nome }} {{ $gestor->ultimoNome }}</h1>
  </div>
  <div class="container-form">
    <input type="hidden" name="id" value="{{ Auth::user ()->id}}" id="">
    <div class="row justify-content-center align-items-center">
      <div class="col-6"  style="padding: 0">
        <div class="edit-button d-flex justify-content-end">
          <a href="{{ route('gestorEditarPerfil.view') }}" style="color:purple; margin-bottom: 5px"><i class="bi bi-pencil"></i>Editar Perfil</a>
        </div>
        <a class="card-link" href="">
          <div class="card h-100" style="margin: 0">
            <div class="icon-card">
              <img width="100px" height="100px" style="border-radius: 50px;" src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('imagens/nophoto.jpg') }}">
            </div>
            <div class="card-body">              
              <h5 class="card-title-content">{{ $gestor->nome }} {{ $gestor->ultimoNome }}</h5>
              <p>{{ $gestor->email }}</p>
              <p>{{ $gestor->contacto }}</p>
              <p>{{ $gestor->localidade }}</p>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
