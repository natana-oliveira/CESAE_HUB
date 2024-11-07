@extends('layouts.gestor-master')
@section('content')

<div class="container-page">

    <h2>Adicionar Módulos</h2>
    <br>

    <div class="container-form">
        <form method="POST" action="{{route('modulo.create')}}">
            @csrf

            <div class="row row-form">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Nome*</label>
                    <input type="text" name="nome" class="form-control" id="inputLine" required>
                    
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Número de Horas*</label>
                    <input type="number" name="nr_horas" class="form-control" id="inputLine" required>
                    
                </div>
            </div>

            <button type="submit" class="btn btn-primary-purple" >Criar</button>
        </form>
    </div>
</div>

@endsection