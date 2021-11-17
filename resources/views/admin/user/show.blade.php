@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $tarefa->tarefa }}</div>
                    <div class="card-body">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label class="form-label">Data limite para conclusão</label>
                                <h4>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</h4>
                            </div>
                        </fieldset>
                        <a href="{{url()->previous()}}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection