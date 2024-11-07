@extends('layouts.admin-master')
@section('content')
<div class="container-page" style="height: 210px">
  <div class="top-page">
    <h1 class="section-title">Cursos</h1>
    <a class="btn btn-primary-purple" href="{{ route('curso.add') }}">Criar curso</a>
  </div>
  <form method="GET" action="{{ route('curso.filter') }}">
    <div class="row row-filter" style="--bs-gutter-x: 0">
      <div class="form-group"  style="max-width: 23%">
        <select class="form-control" id="tipoFormacao" name="tipoFormacao" style="width: 95%">
          <option value="" selected>Tipo de formação</option>
            <option>Formação não financiada</option>
            <option>Aprendizagem</option>
            <option>Capacitação para a Inclusão</option>
            <option>CET</option>
            <option>#digitalReskilling</option>
            <option>Reskilling 4 Employment</option>
            <option>EFA</option>
            <option>Emprego +Digital</option>
            <option>Jovem +Digital</option>
            <option>Qualificação de Formadore</option>
            <option>Qualificação para a Internacionalização</option>
            <option>MOVE</option>
            <option>UFCD</option>
            <option>Vida Ativa</option>
            <option>CENTRO QUALIFICA</option>
          </select>
       </div>
      <div class="form-group"  style="max-width: 23%">
        <select class="form-control" id="area" name="area" style="width: 95%">
            <option value="" selected>Área de Formação</option>
            <option value="Development">Development</option>
            <option value="Media Design">Media Design</option>
            <option value="IT Network">IT Network</option>
            <option value="People">People</option>
        </select>
      </div>
      <div class="form-group"  style="max-width: 23%">
        <select class="form-control" id="regime" name="regime" style="width: 95%">
            <option value="" selected>Regime</option>
            <option>Presencial</option>
            <option>Online</option>
            <option>Híbrido</option>     
        </select>
      </div>
      <div class="form-group"  style="max-width: 23%">
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
      <div  class="form-group filter-form" style="max-width: 8%">
        <button type="submit" class="btn btn-primary-purple">Filtar</button>
      </div>
    </div>  
</form> 
<div class="d-flex justify-content-end" style="margin-top: 15px">
    <button class="btn-delete" style="margin-right: 8px">
        <i class="bi bi-share-fill"></i>
    </button>
    <button class="btn-delete">
        <i class="bi bi-printer-fill"></i>
    </button>
</div>
</div>
  <div class="table-curso">
    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <table class="table table-bordered tabela-cursos">
      <thead>
        <tr>
          <th scope="col" style="text-align: center">Id</th>
          <th scope="col">Curso</th>
          <th scope="col">Tipo de Formação</th>
          <th scope="col">Área da Formação</th>
          <th scope="col">Regime</th>
          <th scope="col">Localização</th>
          <th scope="col">Duração</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($curso as $curso)    
        <tr>
          <td scope="row" style="text-align: center">{{ $curso->id}}</td>
          <td>{{ $curso->nome}}</td>
          <td>{{ $curso->tipoFormacao}}</td>
          <td>{{ $curso->area}}</td>
          <td>{{ $curso->regime}}</td>
          <td>{{ $curso->localidade}}</td>
          <td>{{ $curso->duracao_horas}}</td>
          <td>
            <a href="{{route('curso.view',$curso->id)}}"><i class="bi bi-pencil" style="padding-right: 15px; color:#202224"></i></a>
            <a
            data-bs-toggle="modal" {{-- recebe info como modal --}}
            data-bs-target="#deleteModal_{{$curso->id}}"
            {{-- aponta o id no modal com o id do curso--}}
            ><i class="bi bi-trash3" style="color:#202224"></i></a>            
          </td>
        </tr>
        <div class="modal fade" id="deleteModal_{{$curso->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close" style="margin-bottom: 10px"></button>
            <div class="modal-body">
              <p>Tem certeza que deseja apagar o curso</p>
            <h2 class="modal-title"style="padding-bottom: 25px">{{$curso->nome }}</h2>     
            </div>          
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" data-bs-dismiss="modal" class="btn-primary-purple" style="margin-right: 35px">Voltar</button>
              <a href="{{ route('curso.delete', $curso->id)}}" class="btn-primary-red">Deletar</a>
            </div>    
          </div>          
        </div>
        </div>     
        @endforeach
      </tbody>
    </table>
 </div> 
@endsection