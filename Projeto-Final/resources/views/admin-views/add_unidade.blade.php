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
      <button type="submit" class="btn btn-primary-purple">Criar conta</button>   
      </form> 
    </div>  
@endsection