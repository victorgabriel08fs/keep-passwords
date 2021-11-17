@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Acesso negado</div>

                    <div class="card-body">
                            Você não possui permissão para acessar este recurso!
                            <br>

                        <a href="{{ route('index') }}">Clique aqui para voltar para a aplicação</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection