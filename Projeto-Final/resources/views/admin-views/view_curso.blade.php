@extends('layouts.admin-master')
@section('content')<div class="container-page">
  <div class="top-page">
    <h2 class="">Atualizar curso</h2>
  </div>
  <div class="container-form">    
    <form method="POST" action="{{route('curso.update')}}">
      @csrf  
      <input type="hidden" name="id" value="{{ $curso->id }}" id="">
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">Curso*</label>
          <input type="text" value="{{ $curso -> nome}}" name="nome" class="form-control" id="inputLine" required>
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
            <option value="Formação não financiada" @if($curso->tipoFormacao == 'Formação não financiada') selected @endif>Formação não financiada</option>             
            <option value="Aprendizagem" @if($curso->tipoFormacao == 'Aprendizagem') selected @endif>Aprendizagem</option>
            <option value="Capacitação para a Inclusão" @if($curso->tipoFormacao == 'Capacitação para a Inclusão') selected @endif>Capacitação para a Inclusão</option>             
            <option value="CET" @if($curso->tipoFormacao == 'CET') selected @endif>CET</option>
            <option value="#digitalReskilling" @if($curso->tipoFormacao == '#digitalReskilling') selected @endif>#digitalReskilling</option>             
            <option value="Reskilling 4 Employment" @if($curso->tipoFormacao == 'Reskilling 4 Employment') selected @endif>Reskilling 4 Employment</option>
            <option value="EFA" @if($curso->tipoFormacao == 'EFA') selected @endif>EFA</option>             
            <option value="Emprego +Digital" @if($curso->tipoFormacao == 'Emprego +Digital') selected @endif>Emprego +Digital</option>
            <option value="Jovem +Digital" @if($curso->tipoFormacao == 'Jovem +Digital') selected @endif>Jovem +Digital</option>             
            <option value="Qualificação de Formadores" @if($curso->tipoFormacao == 'Qualificação de Formadores') selected @endif>Qualificação de Formadores</option>            
            <option value="Qualificação para a Internacionalização" @if($curso->tipoFormacao == 'Qualificação para a Internacionalização') selected @endif>Qualificação para a Internacionalização</option>
            <option value="MOVE" @if($curso->tipoFormacao == 'MOVE') selected @endif>MOVE</option>             
            <option value="UFCD" @if($curso->tipoFormacao == 'UFCD') selected @endif>UFCD</option>            
            <option value="Vida Ativa" @if($curso->tipoFormacao == 'Vida Ativa') selected @endif>Vida Ativa</option>
            <option value="CENTRO QUALIFICA" @if($curso->tipoFormacao == 'CENTRO QUALIFICA') selected @endif>CENTRO QUALIFICA</option>                  
          </select>        
        </div> 
      </div>      
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1">Área de formação*</label>
          <select id="inputLine" name="area" class="form-control">
            <option selected>Selecionar...</option>
            <option value="Development" @if($curso->area == 'Development') selected @endif>Development</option>
            <option value="Media Design" @if($curso->area == 'Media Design') selected @endif>Media Design</option>
            <option value="IT Network" @if($curso->area == 'IT Network') selected @endif>IT Network</option>
            <option value="People" @if($curso->area == 'People') selected @endif>People</option>
          </select>        
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1">Regime</label>
          <select id="inputLine" name="regime" class="form-control">
            <option selected>Selecionar...</option>
            <option value="Presencial" @if($curso->regime == 'Presencial') selected @endif>Presencial</option>
            <option value="Online" @if($curso->regime == 'Online') selected @endif>Online</option>
            <option value="Híbrido" @if($curso->regime == 'Híbrido') selected @endif>Híbrido</option>           
          </select>        
        </div>
      </div>
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1">Localização</label>
          <select id="inputLine" name="localidade" class="form-control" required>
            <option selected>Selecionar...</option>            
            <option value="Aveiro" @if($curso->localidade == 'Aveiro') selected @endif>Aveiro</option>
            <option value="Braga" @if($curso->localidade == 'Braga') selected @endif>Braga</option>
            <option value="Coimbra" @if($curso->localidade == 'Coimbra') selected @endif>Coimbra</option>
            <option value="Espinho" @if($curso->localidade == 'Espinho') selected @endif>Espinho</option>
            <option value="Leça da Palmeira" @if($curso->localidade == 'Leça da Palmeira') selected @endif>Leça da Palmeira</option>
            <option value="Lisboa" @if($curso->localidade == 'Lisboa') selected @endif>Lisboa</option>
            <option value="Marco de Canaveses" @if($curso->localidade == 'Marco de Canaveses') selected @endif>Marco de Canaveses</option>
            <option value="Oliveira de Azeméis" @if($curso->localidade == 'Oliveira de Azeméis') selected @endif>Oliveira de Azeméis</option>
            <option value="Porto" @if($curso->localidade == 'Porto') selected @endif>Porto</option>
            <option value="São João da Madeira" @if($curso->localidade == 'São João da Madeira') selected @endif>São João da Madeira</option>
            <option value="Vila do Conde" @if($curso->localidade == 'Vila do Conde') selected @endif>Vila do Conde</option>
            <option value="Viseu" @if($curso->localidade == 'Viseu') selected @endif>Viseu</option>
          </select>        
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">Duração</label>
          <input type="number" value="{{ $curso -> duracao_horas}}" name="duracao_horas" class="form-control" id="inputLine" required>
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
            <option value="{{ $cursoGestor->gestores_id }}" @if ($cursoGestor->gestores_id == $curso->gestores_id) selected @endif>
                {{ $cursoGestor->nome_gestor }} {{ $cursoGestor->ultimoNome_gestor }}
            </option>
        @endforeach  
          </select>        
        </div> 
      </div>  
      <div class="confirmationButton d-flex justify-content-end">
        <button type="submit" class="btn btn-primary-purple" data-bs-toggle="modal" {{-- recebe info como modal --}}
        data-bs-target="#updateModal_{{$curso->id}}" {{-- aponta o id no modal com o id do curso--}}>
        Atualizar curso</button>
    <div class="modal fade" id="updateModal_{{$curso->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img src="{{ asset('imagens/checkSucess.png') }}" alt="">
          <p>Curso atualizado com sucesso</p>
        <h2 class="modal-title"style="padding-bottom: 25px">{{$curso->nome }}</h2>     
        </div>  
      </div>          
    </div>
    </div> 
      </div>
    </form> 
  </div>
@endsection