@extends('layouts.gestor-master')
@section('content')

<link rel="stylesheet" href="/css/gestor.css">





<div class="container-page"> <!-- Div que contém todo o conteudo da pagina -->

<!-- For Each para correr a Tabela e add formador  sempre que lá tiver info  -->

    @if($formadores->isNotEmpty())
    <h1>Formadores</h1>
    <br>
    <div class="row">
        @foreach($formadores as $formador)
            <div class="col-md-4 mb-4">
                <a class="card-link" href="{{route('gestor.formadorperfil',$formador->users_id)}}">
                <div class="card">

                    <div class="icon-card" style="background-color: #AB87BC">
                        {{-- <img width="100px" height="100px" style="border-radius: 50px;"
                                src="{{ $formador->photo ? asset('storage/' . $formador()->photo) : asset('imagens/nophoto.jpg') }}"> --}}
                                <img width="100px" height="100px" style="border-radius: 50px;"
                            src="{{ $formador->photo ? asset('storage/' . $formador->photo) : asset('imagens/nophoto.jpg') }}">
                        </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $formador->nome }}</h5>
                        <p class="card-text">{{ $formador->email }}</p>
                    </div>
                </div>
            </a>
            </div>
        @endforeach
    </div>
@else
    <p>Não há formadores registados de momento.</p>
@endif


 

    {{-- <div class="container-content"><!-- Div que contém todo o conteudo em si -->
        
        <div class="row"> <!-- linha conteudo -->

            <div class="col-3"> <!-- coluna (bootstrap) -->
                <a class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-card" style="background-color: #31AAE1">
                                <i class="bi bi-people "></i><!-- trocar pela fotografia -->
                              </div>  
                            <h5 class="card-title-content">Nome Formador</h5>
                            <p>email formador</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3"> <!-- coluna (bootstrap) -->
                <a class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-card" style="background-color: #31AAE1">
                                <i class="bi bi-people "></i><!-- trocar pela fotografia -->
                              </div>  
                            <h5 class="card-title-content">Nome Formador</h5>
                            <p>email formador</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3"> <!-- coluna (bootstrap) -->
                <a class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-card" style="background-color: #31AAE1">
                                <i class="bi bi-people "></i><!-- trocar pela fotografia -->
                              </div>  
                            <h5 class="card-title-content">Nome Formador</h5>
                            <p>email formador</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>


    </div> --}}

</div> 



    
@endsection