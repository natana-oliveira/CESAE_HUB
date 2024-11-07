@extends('layouts.formador-master')
@section('content')
<link rel="stylesheet" href="/css/formador-dashboard.css"> 

<input type="hidden" name="id" value="{{ Auth::user ()->id}}" id="">


<div class="container-page" style="height:72vh">
    <h3> Editar Perfil </h3>
    <br>

    <form method="POST" action="{{ route('formadorEditarPerfil.update', ['id' => Auth::user ()->id]) }}"
        enctype="multipart/form-data">
        @csrf

        <!-- Parte pessoal -->
        <h4>Informação Pessoal</h4>
<br>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Fotografia de Perfil</label>
            {{-- @if(Auth::user ()->photo )
            <img width="100px" height="100px" style="border-radius: 50px;"
                src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('imagens/nophoto.jpg') }}">
            @endif
            <br> --}}
            <input accept="image/*" type="file" value="{{ Auth::user ()->photo }}" name="photo" class="form-control"
                id="exampleFormControlInput1">
            @error('photo')
            <div class="alert alert-danger">
                Fotografia Inválida
            </div>
            @enderror
        </div>
        <br>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputNome">Primeiro Nome*</label> <br>
                <input type="text" class="form-control" id="input" value="{{ Auth::user ()->nome }}" name="nome">
            </div><br>
            <div class="form-group col-md-6">
                <label for="inputUltimoNome">Último Nome*</label><br>
                <input type="text" class="form-control" id="input" value="{{ Auth::user ()->ultimoNome }}"
                    name="ultimoNome">
            </div><br>
        </div><br>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputTelemovel">Telemovel*</label> <br>
                <input type="text" class="form-control" id="input" value="{{ Auth::user ()->contacto }}"
                    name="contacto">
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