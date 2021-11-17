@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar usuário</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', ['user' => $user]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $user->name ?? old('name') }}">
                                {{ $errors->has('name') ? $errors->first('name') : '' }}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email"
                                    value="{{ $user->email ?? old('email') }}">
                                {{ $errors->has('email') ? $errors->first('email') : '' }}
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Perfil</label>
                                <select class="form-control" name="is_admin">
                                    <option value="0"
                                        {{ $user->is_admin == false ? 'selected' : '' }}>
                                        Usuário
                                    </option>
                                    <option value="1"
                                        {{ $user->is_admin == true ? 'selected' : '' }}>
                                        Administrador
                                    </option>
                                </select>
                            </div> --}}

                            <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection