@extends('layouts.formador-master')
@section('content')
<link rel="stylesheet" href="/css/formador-dashboard.css"> 

<div class="container-page">
    <div class="top-page">
        <h2>Informação Profissional</h2>
    </div>

    <h6>* Preencha todos os campos abaixo conforme a sua disponibilidade e conhecimentos especificos</h6>

    <br><br>

    <input type="hidden" value="{{ Auth::user ()->id}}" id="">



    <form method="POST" action="{{route('formadorProfissional.add')}}">
        @csrf

       
        <!-- Parte profissinal -->
        <h4>Informação Profissional</h4>

        <br>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputArea"><b>Áreas de atuação</b></label> <br>
                <select class="form-control" id="inputDrop"  name="areaAtuacao">
                    <option>Selecionar...</option>
                    <option> Development </option>
                    <option >Media Design</option>
                    <option>IT Network</option>
                    <option >People</option>
                </select>
            </div><br>
            <div class="form-group col-md-6">
                <label for="inputRegime"><b>Regime</b></label><br>
                <select class="form-control" id="inputDrop" name="regime">
                    <option>Selecionar...</option>
                    <option>Online</option>
                    <option>Presencial
                    </option>
                    <option >Hibrido</option>
                </select>
            </div><br>
        </div><br>

        <br>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputDistrito"><b>Localização</b></label>
                <select class="form-control" id="inputDrop" name="localizacao">
                    <option selected>Selecionar...</option>
                    <option>Aveiro</option>
                    <option>Braga</option>
                    <option>Coimbra
                    </option>
                    <option>Espinho
                    </option>
                    <option>Leça da Palmeira</option>
                    <option>Lisboa</option>
                    <option>Marco de Canaveses</option>
                    <option>Oliveira de Azeméis</option>
                    <option>Porto</option>
                    <option>São João da Madeira</option>
                    <option >Vila do Conde</option>
                    <option>Viseu</option>
                </select>
            </div>
            

            <div class="col-md-6">
                <label class="form-check-label"><b>Modulos</b></label><br>
                <select class="form-control" id="inputDrop" name="modulos_id">
               
                <option>Engenharia de Softwares</option>
                <option>Programacao</option>
                <option>Tecnologias Web</option>
                <option>Tecnologias Mobile</option>
                <option>Design de Comunicacao</option>
                <option>Multimedia</option>
                <option>UI/UX Design</option>
                <option>Marketing</option>
                <option>Redes Informatica</option>
                <option>Ciber Seguranca</option>
                <option>AWS Re/Start</option>
                <option>Administracao</option>
                <option>Gestao de Tempo</option>
                <option>Escrita Criativa</option>
                <option>Linguas</option>
                


        
        </select>
            </div> 

        </div>
        <br>
        



        <button href="" type="submit" class="btn-primary-purple">Guardar</button>

    </form>
</div>
@endsection