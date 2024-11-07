@extends('layouts.gestor-master')
@section('content')

<div class="container-page">

    <h2>Atualizar Módulos</h2>

    <div class="container-form">
        <form method="POST" action="{{ route('modulo.update') }}">
            @csrf

            <div class="row row-form">
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Nome*</label>
                    <input type="text" value="{{ $modulos->nome }}" name="nome" class="form-control" id="inputLine" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Número de Horas*</label>
                    <input type="number" value="{{ $modulos->nr_horas }}" name="nr_horas" class="form-control" id="inputLine" required>
                </div>
            </div>

            <input type="hidden" name="id" value="{{ $modulos->id }}">

            <button type="submit" class="btn btn-primary-purple">Guardar</button>
        </form>
    </div>
</div>
        
@endsection
