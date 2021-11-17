@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nova Senha</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $password->name ?? old('name') }}">
                                {{ $errors->has('name') ? $errors->first('name') : '' }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Usuário</label>
                                <input type="text" class="form-control" name="user_name"
                                    value="{{ $password->user_name ?? old('user_name') }}">
                                {{ $errors->has('user_name') ? $errors->first('user_name') : '' }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Senha</label>
                                <input type="password" class="form-control" name="password"
                                    value="{{ $password->password ?? old('password') }}">
                                {{ $errors->has('password') ? $errors->first('password') : '' }}
                            </div>
                            <br>
                            <a href="{{ url()->previous() }}" class="btn btn-primary mr-3">Voltar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                        <br>
                        @component('passwords._modals.password-generate')
                            
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
