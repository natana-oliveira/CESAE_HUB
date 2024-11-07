@extends('layouts.admin-master')
@section('content')
<div class="container-page">
  <div class="container-content d-flex justify-content-center">
    <div class="container-left-elements">
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <a class="card-link" href="{{ route('admin.cursos') }}">
            <div class="card">            
              <div class="icon-card" style="background-color: #AB87BC">
                <i class="bi bi-journal-code "></i>
              </div>              
            <div class="card-body">
              <h5 class="card-title">Criar cursos</h5>           
            </div>
          </div>
        </a> 
        </div>
        <div class="col">   
          <a class="card-link" href="{{ route('admin.contas') }}">
          <div class="card">            
              <div class="icon-card" style="background-color: #31AAE1">
                <i class="bi bi-people "></i>
              </div>              
            <div class="card-body">
              <h5 class="card-title">Criar contas</h5>                     
            </div>             
          </div>
        </a> 
        </div>
        <div class="col">
          <a class="card-link" href="{{ route('admin.areaFormacao') }}">
          <div class="card">            
              <div class="icon-card" style="background-color: #E5047E">
                <i class="bi bi-book "></i>
              </div>              
            <div class="card-body">
              <h5 class="card-title">Áreas de formação</h5>                       
            </div>
          </div>
        </a> 
        </div>
        <div class="col">
          <a class="card-link" href="{{ route('admin.unidades') }}">
          <div class="card">            
              <div class="icon-card" style="background-color: #362664  ">
                <i class="bi bi-house"></i>
              </div>              
            <div class="card-body">
              <h5 class="card-title">Unidades</h5>                       
            </div>
          </div>
        </a> 
        </div>
      </div>
  </div>
</div>
</div>
@endsection
