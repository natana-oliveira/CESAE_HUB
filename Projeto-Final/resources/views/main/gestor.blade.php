@extends('layouts.gestor-master')
@section('content')

<div class="container-page">
    <div class="container-content">
        <div class="container-left-elements">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <a class="card-link" href="{{ route('gestor.addturmas') }}">
                        <div class="card">
                            <div class="icon-card" style="background-color: #AB87BC">
                                <i class="bi bi-journal-code "></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Adicionar Turma</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="card-link" href="{{ route('gestor.formadores') }}">
                        <div class="card">
                            <div class="icon-card" style="background-color: #31AAE1">
                                <i class="bi bi-people "></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Consultar Formadores</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="card-link" href="{{ route('gestor.horarios') }}">
                        <div class="card">
                            <div class="icon-card" style="background-color: #E5047E">
                                <i class="bi bi-book "></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Alterar Horário</h5>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        
    </div>
</div>
</div>
@endsection