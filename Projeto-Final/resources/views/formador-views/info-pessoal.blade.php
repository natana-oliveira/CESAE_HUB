@extends('layouts.formador-master')
@section('content')
<link rel="stylesheet" href="/css/formador-dashboard.css"> 


<div class="container-page">
  <div class="top-page">
    <h2>Informação Pessoal</h2>
  </div>

  <input type="hidden" value="{{ Auth::user ()->id}}" id="">

  <!-- Inserir informação -->
  <form method="POST" action="{{route('formadorPessoal.add')}}" enctype="multipart/form-data">

    @csrf

    
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputNome">Primeiro Nome*</label> <br>
        <input type="text" class="form-control" id="input">
      </div><br>
      <div class="form-group col-md-6">
        <label for="inputUltimoNome">Último Nome*</label><br>
        <input type="text" class="form-control" id="input">
      </div><br>
    </div><br>

    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputTelemovel">Telemovel*</label> <br>
        <input type="text" class="form-control" id="input">
      </div><br>


      <div class="form-group col-md-6">
                <label for="inputDistrito">Distrito </label>
                <select class="form-control" id="inputDrop" value="{{ Auth::user ()->localidade }}" name="localidade">

                    <option>Selecionar... </option>
                    <option value="Aveiro" @if( Auth::user ()->localidade == 'Aveiro') selected @endif>Aveiro</option>
                    <option value="Beja" @if( Auth::user ()->localidade == 'Beja') selected @endif>Beja</option>
                    <option value="Braga" @if( Auth::user ()->localidade == 'Braga') selected @endif>Braga</option>
                    <option value="Bragança" @if(Auth::user ()->localidade == 'Bragança') selected @endif>Bragança
                    </option>
                    <option value="Castelo Branco" @if(Auth::user ()->localidade == 'Castelo Branco') selected
                        @endif>Castelo Branco</option>
                    <option value="Coimbra" @if(Auth::user ()->localidade == 'Coimbra') selected @endif>Coimbra</option>
                    <option value="Évora" @if(Auth::user ()->localidade == 'Évora') selected @endif>Évora</option>
                    <option value="Faro" @if(Auth::user ()->localidade == 'Faro') selected @endif>Faro</option>
                    <option value="Guarda" @if(Auth::user ()->localidade == 'Guarda') selected @endif>Guarda</option>
                    <option value="Leira" @if(Auth::user ()->localidade == 'Leira') selected @endif>Leira</option>
                    <option value="Lisboa" @if(Auth::user ()->localidade == 'Lisboa') selected @endif>Lisboa</option>
                    <option value="Portalegre" @if(Auth::user ()->localidade == 'Portalegre') selected @endif>Portalegre
                    </option>
                    <option value="Porto" @if(Auth::user ()->localidade == 'Porto') selected @endif>Porto</option>
                    <option value="Santarém" @if(Auth::user ()->localidade == 'Santarém') selected @endif>Santarém
                    </option>
                    <option value="Setúbal" @if(Auth::user ()->localidade == 'Setúbal') selected @endif>Setúbal</option>
                    <option value="Viana do Castelo" @if(Auth::user ()->localidade == 'Viana do Castelo') selected
                        @endif>Viana do Castelo</option>
                    <option value="Vila Real" @if(Auth::user ()->localidade == 'Vila Real') selected @endif>Vila Real
                    </option>
                    <option value="Viseu" @if(Auth::user ()->localidade == 'Viseu') selected @endif>Viseu</option>
                    <!--  Madeira e Açores-->
                    <option value="Região Autónoma da Madeira" @if(Auth::user ()->localidade == 'Região Autónoma da
                        Madeira') selected @endif>Região Autónoma da Madeira</option>
                    <option value="Região Autónoma dos Açores" @if(Auth::user ()->localidade == 'Região Autónoma dos
                        Açores') selected @endif>Região Autónoma dos Açores</option>

                </select>

            </div>

    </div><br>

    <button type="submit" class="btn-primary-purple">Continuar</button>
    <!-- da submit da info e depois vai pra pagina -->
  </form>

</div>

@endsection