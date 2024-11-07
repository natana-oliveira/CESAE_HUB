@extends('layouts.admin-master')
@section('content')
<div class="container-page">
  <div class="top-page">
    <h2 class="">Adicionar nova conta</h2> 
  </div>
  <div class="container-form">    
    <form method="POST" action="{{route('conta.create')}}">
      @csrf  
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">Nome*</label>
          <input type="text" name="nome" class="form-control" id="inputLine" required>
          @error('nome')  
          <div class="alert alert-danger">
              Nome invalido  
          </div> 
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">Último nome*</label>
          <input type="text" name="ultimoNome" class="form-control" id="inputLine" required>
          @error('ultimoNome')  
          <div class="alert alert-danger">
              Nome invalido  
          </div> 
          @enderror
        </div>
      </div>
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">E-mail*</label>
          <input type="text" name="email" class="form-control" id="inputLine" required>
          @error('email')  
          <div class="alert alert-danger">
              E-mail invalido  
          </div> 
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">Password*</label>
          <input type="text" name="password" class="form-control" id="inputLine" required>
          @error('password')  
          <div class="alert alert-danger">
            Password invalida 
          </div> 
          @enderror
        </div>
      </div>
      <div class="row row-form">
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">Localidade*</label>
          <input type="text" name="localidade" class="form-control" id="inputLine" required>
          @error('localidade')  
          <div class="alert alert-danger">
             Localidade invalida  
          </div> 
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlInput1" class="form-label">Contacto*</label>
          <input type="text" name="contacto" class="form-control" id="inputLine" required>
          @error('contacto')  
          <div class="alert alert-danger">
              Contacto invalido  
          </div> 
          @enderror
        </div>
      </div>
      <div class="row row-form">
        <div class="form-group col-md-6">
        <label for="exampleFormControlInput1">Tipo de conta*</label>
        <select id="inputLine" name="user_type" class="form-control">
          <option selected>Selecionar...</option>
          <option value="1">Administrador</option>
          <option value="2">Gestor de curso</option>
          <option value="3">Formador</option>            
        </select>        
      </div>
      </div>
      <div class="confirmationButton d-flex justify-content-end">
        <button type="submit" class="btn btn-primary-purple" data-bs-toggle="modal" {{-- recebe info como modal --}}
        data-bs-target="#createModal" {{-- aponta o id no modal com o id do user--}}>
        Criar conta</button>        
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img src="{{ asset('imagens/checkSucess.png') }}" alt="">
          <p>Conta criada com sucesso</p>
        </div>  
      </div>          
    </div>
    </div> 
      </div>
      </form> 
    </div>  
@endsection