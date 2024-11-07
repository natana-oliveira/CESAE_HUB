@extends('layouts.formador-master')
@section('content')
<link rel="stylesheet" href="/css/formador-dashboard.css"> 

<input type="hidden" name="id" value="{{ $formador->id}}" id="">


<div class="container-page" style="height:72vh">
    <h3> Editar Perfil </h3>
    <br>

    <form method="POST" action="{{ route('formadorEditarPerfilProfissional.update', ['id' => $formador->id]) }}">
        @csrf

        <!-- Parte profissinal -->
        <h4>Informação Profissional</h4>

        <br>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputArea"><b>Áreas de atuação</b></label> <br>
                <select class="form-control" id="inputDrop" value="{{ $formador->area }}" name="areaAtuacao">
                    <option>Selecionar...</option>
                    <option value="Development" @if( $formador->area == 'Development') selected
                        @endif>Development</option>
                    <option value="Media Design" @if( $formador->area == 'Media Design') selected
                        @endif>Media Design</option>
                    <option value="IT Network" @if( $formador->area == 'IT Network') selected @endif>IT
                        Network</option>
                    <option value="People" @if( $formador->area == 'People') selected @endif>People</option>
                </select>
            </div><br>
            <div class="form-group col-md-6">
                <label for="inputRegime"><b>Regime</b></label><br>
                <select class="form-control" id="inputDrop" value="{{ $formador->regime }}" name="regime">
                    <option>Selecionar...</option>
                    <option value="Online" @if( $formador->regime == 'Online') selected @endif>Online</option>
                    <option value="Presencial" @if( $formador->regime == 'Presencial') selected @endif>Presencial
                    </option>
                    <option value="Hibrido" @if( $formador->regime == 'Hibrido') selected @endif>Hibrido</option>
                </select>
            </div><br>
        </div><br>

        <br>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputDistrito"><b>Localização</b></label>
                <select class="form-control" id="inputDrop" value="{{ $formador->localizacao }}" name="localizacao">
                    <option selected>Selecionar...</option>
                    <option value="Aveiro" @if($formador->localizacao == 'Aveiro') selected @endif>Aveiro</option>
                    <option value="Braga" @if($formador->localizacao == 'Braga') selected @endif>Braga</option>
                    <option value="Coimbra" @if($formador->localizacao == 'Coimbra') selected @endif>Coimbra
                    </option>
                    <option value="Espinho" @if($formador->localizacao == 'Espinho') selected @endif>Espinho
                    </option>
                    <option value="Leça da Palmeira" @if($formador->localizacao == 'Leça da Palmeira') selected
                        @endif>Leça da Palmeira</option>
                    <option value="Lisboa" @if($formador->localizacao == 'Lisboa') selected @endif>Lisboa</option>
                    <option value="Marco de Canaveses" @if($formador->localizacao == 'Marco de Canaveses') selected
                        @endif>Marco de Canaveses</option>
                    <option value="Oliveira de Azeméis" @if($formador->localizacao == 'Oliveira de Azeméis')
                        selected @endif>Oliveira de Azeméis</option>
                    <option value="Porto" @if($formador->localizacao == 'Porto') selected @endif>Porto</option>
                    <option value="São João da Madeira" @if($formador->localizacao == 'São João da Madeira')
                        selected @endif>São João da Madeira</option>
                    <option value="Vila do Conde" @if($formador->localizacao == 'Vila do Conde') selected
                        @endif>Vila do Conde</option>
                    <option value="Viseu" @if($formador->localizacao == 'Viseu') selected @endif>Viseu</option>
                </select>
            </div>
            

            <div class="col-md-6">
                <label class="form-check-label"><b>Modulos</b></label><br>
                <select class="form-control" id="inputDrop" name="modulos_id">
                @foreach ($todosModulos as $id => $modulo)
            <option value="{{ $id }}" {{ isset($modulos[$id]) ? 'selected' : '' }}>{{ $modulo }}</option>
        @endforeach
        </select>
            </div> 

        </div>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn-primary-purple" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Atualizar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja atualizar o perfil?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('imagens/checkSucess.png') }}" alt="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn-primary-purple">Atualizar</button>

                    </div>
                </div>
            </div>
        </div>
        
        <!-- <button type="submit" class="btn-primary-purple">Atualizar</button> -->
    </form>
</div>
@endsection