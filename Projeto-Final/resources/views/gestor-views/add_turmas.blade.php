@extends('layouts.gestor-master')
@section('content')
    <div class="container-page">
        <div class="top-page">
            <h2 class="">Nova turma</h2>
        </div>

        <div class="container-form">
            <form method="POST" action="{{ route('turma.create') }}">
                @csrf
                <div class="row row-form">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Código*</label>
                        <input type="text" name="codigo" value=" " class="form-control" id="inputLine" required>
                        @error('codigo')
                            <div class="alert alert-danger">
                                Codigo invalido
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Número de Alunos*</label>
                        <input type="number" name="nr_alunos" value=" " class="form-control" id="inputLine" required>
                        @error('nr_alunos')
                            <div class="alert alert-danger">
                                numero inválido
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="dataInicio" class="form-label">Data de Início</label>
                        <input type="date" value=" " class="form-control" id="dataInicio" name="data_inicio"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dataConclusao" class="form-label">Data de Conclusão</label>
                        <input type="date" value=" " class="form-control" id="dataConclusao" name="data_fim"
                            required>
                    </div>
                </div>
                <br>
                <!-- For each para ir buscar os cursos -->

                <select name="cursos_id" class="form-control">
                    <option selected>Todos os cursos</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>

                <br> <br> <br>

                <div class="row justify-content-end">
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn-primary-purple" style="text-decoration:none;color:white;">Criar</button>

            </form>
        @endsection
