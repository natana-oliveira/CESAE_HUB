@extends('layouts.admin-master')
@section('content')
<div class="container-page">
  <div class="top-page">
    <h1 class="section-title">Contas</h1>
    <a class="btn btn-primary-purple" href="{{ route('conta.add') }}">Criar conta</a>   
  </div>
  <form method="GET" action="{{ route('conta.filter') }}">
  <div class="row row-filter" style="--bs-gutter-x: 0">
    <div class="form-group"  style="max-width: 23%">
      <select class="form-control" id="user_type" name="user_type" style="width: 95%">
          <option value="" selected>Tipo de conta</option>
          <option value="1">Administrador</option>
          <option value="2">Gestor de curso</option>
          <option value="3">Formador</option>         
      </select>
    </div>
    <div  class="form-group filter-form" style="max-width: 8%">
      <button type="submit" class="btn btn-primary-purple">Filtar</button>
    </div>
  </div>  
</form> 
</div>
  <div class="table-contas">
    @if (session('message')) 
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif
    <table class="table table-bordered tabela-cursos">
      <thead>
        <tr>
          <th scope="col" style="padding-left: 25px">Id</th>
          <th scope="col">Primeiro nome</th>
          <th scope="col">Ultimo nome</th>
          <th scope="col">Conta</th>
          <th scope="col">E-mail</th>
          <th scope="col">Contacto</th>
          <th scope="col">Localidade</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($conta as $item)    
        <tr>
          <td scope="row" style="padding-left: 25px">{{ $item->id}}</td>
          <td>{{ $item->nome}}</td>
          <td>{{ $item->ultimoNome}}</td>
          <td>
            @if($item->user_type == 1)
                Administrador
            @elseif($item->user_type == 2)
                Gestor
            @elseif($item->user_type == 3)
                Formador
            @endif
        </td>
          <td>{{ $item->email}}</td>
          <td>{{ $item->contacto}}</td>
          <td>{{ $item->localidade}}</td>
          <td>
            <a href="{{route('conta.view',$item->id)}}"><i class="bi bi-pencil" style="padding-right: 15px; color:#202224"></i></a>
            <a
            data-bs-toggle="modal" {{-- recebe info como modal --}}
            data-bs-target="#deleteModal_{{$item->id}}"
            {{-- aponta o id no modal com o id do curso--}}
            ><i class="bi bi-trash3" style="color:#202224"></i></a>            
          </td>
        </tr>
        <div class="modal fade" id="deleteModal_{{$item->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close" style="margin-bottom: 10px"></button>
            <div class="modal-body">
              <p>Tem certeza que deseja apagar a conta </p>
            <h2 class="modal-title">{{$item->nome }}</h2>
            <p>{{ $item->email }}</p>     
            </div>          
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" data-bs-dismiss="modal" class="btn-primary-purple" style="margin-right: 35px">Voltar</button>
              <a href="{{ route('conta.delete', $item->id)}}" class="btn-primary-red">Deletar</a>
            </div>    
          </div>          
        </div>
        </div>   
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection