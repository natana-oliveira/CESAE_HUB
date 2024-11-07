@extends('layouts.admin-master')
@section('content')
<div class="container-page">
  <div class="top-page">
    <h2 class="subtitulo">Adicionar novo curso</h2> 
  </div>
  <div class="container-form">    
    <form method="POST" action="{{route('curso.create')}}">
      @csrf
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">Curso*</label>
          <input type="text" name="nome" class="form-control" id="inputLine" required>
          @error('nome')  
          <div class="alert alert-danger">
              Nome invalido  
          </div> 
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1">Tipo de formação</label>
          <select id="inputLine" name="tipoFormacao" class="form-control">
            @error('tipoFormacao')  
            <div class="alert alert-danger">
                Tipo de Formação Inválido 
            </div> 
            @enderror
            <option selected>Selecionar...</option>
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
      </div>      
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1">Área de formação*</label>
          <select id="inputLine" name="area" class="form-control">
            <option selected>Selecionar...</option>
            <option>Development</option>
            <option>Media Design</option>
            <option>IT Network</option>
            <option>People</option>     
          </select>        
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1">Regime</label>
          <select id="inputLine" name="regime" class="form-control">
            <option selected>Selecionar...</option>
            <option>Presencial</option>
            <option>Online</option>
            <option>Híbrido</option>            
          </select>        
        </div>
      </div>
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1">Localização</label>
          <select id="inputLine" name="localidade" class="form-control" required>
            <option selected>Selecionar...</option>
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
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">Duração</label>
          <input type="number" name="duracao_horas" class="form-control" id="inputLine" required>
          @error('duracao_horas') 
          <div class="alert alert-danger">
              Duração invalida 
          </div> 
          @enderror 
        </div>
      </div>
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1">Gestor do curso</label>          
          <select id="inputLine" name="gestores_id" class="form-control">
            <option selected>Selecionar...</option>
            @foreach ($cursosGestores as $cursoGestor)
            <option value="{{ $cursoGestor->gestores_id }}">{{ $cursoGestor->nome_gestor }} {{ $cursoGestor->ultimoNome_gestor }}</option>
            @endforeach            
          </select>        
        </div>
      </div>
      <div class="confirmationButton d-flex justify-content-end">
        <button type="submit" class="btn btn-primary-purple" data-bs-toggle="modal"
        data-bs-target="#createModal">
        Criar curso</button>        
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img src="{{ asset('imagens/checkSucess.png') }}" alt="">
          <p>Curso criado com sucesso</p>
        </div>  
      </div>          
    </div>
    </div> 
      </div>
      </div>   
    </form>    
  </div>
@endsection