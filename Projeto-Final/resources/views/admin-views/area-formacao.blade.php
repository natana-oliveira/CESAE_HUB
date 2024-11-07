@extends('layouts.admin-master')
@section('content')
<div class="container-page" style="height:75vh">
  <div class="top-page">
    <h1 class="section-title">Áreas de Formação</h1>
    <a class="btn btn-primary-purple"  href="{{ route('areaFormacao.add') }}">Inserir área de formação</a>
  </div>
  <div class="cardsAreaFormacao">
    <div class="row row-cols-sm-4 m-4 g-4" style="height: 95%">
      <div class="col col-card">
        <a class="card-link" href="{{ route('curso.filter', 'Development') }}">
          <a class="card-link" href="{{ route('curso.filter', ['area' => 'Development']) }}">
          <div class="card w-100">          
            <div  class="icon-card" style="background-color: #31AAE1">
              <i class="bi bi-code-slash"></i>
            </div>            
            <div class="card-body">
            <h5 class="card-title">Development</h5>
          </div>      
        </div>
        </a>        
      </div>
      <div class="col col-card">
        <a class="card-link" href="{{ route('curso.filter', ['area' => 'Media Design']) }}">
          <div class="card w-100">
            <div  class="icon-card" style="background-color: #AB87BC">
              <i class="bi bi-lightbulb"></i>
            </div>            
            <div class="card-body">
            <h5 class="card-title">Media Design</h5>
          </div>         
        </div>
        </a>        
      </div>
      <div class="col col-card">
        <a class="card-link" href="{{ route('curso.filter', ['area' => 'It Network']) }}">
          <div class="card w-100">
            <div  class="icon-card" style="background-color: #362664">
              <i class="bi bi-pc-display"></i>
            </div>            
            <div class="card-body">
            <h5 class="card-title">IT Network</h5>
          </div>        
        </div>
        </a>        
      </div>
      <div class="col col-card">
        <a class="card-link" href="{{ route('curso.filter', ['area' => 'People']) }}">
          <div class="card w-100">
            <div  class="icon-card" style="background-color: #E5047E">
              <i class="bi bi-people"></i>
            </div>            
            <div class="card-body">
            <h5 class="card-title">People</h5>
          </div>        
        </div>
        </a>        
      </div>
  </div>
</div> 
@endsection