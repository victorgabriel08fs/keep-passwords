@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Senhas</div>

                    <div class="card-body">
                        <a class="btn btn-primary mb-3 mr-3" href="{{ route('password.create') }}">Guardar Senha</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Usuário</th>
                                    <th scope="col">Senha</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($passwords as $password)
                                    <tr>
                                        <td>{{ $password->name }}</td>
                                        <td>{{ $password->user_name }}</td>
                                        <td><button id="copy" onmouseover="this.style.backgroundColor='#000';this.style.color='#FFF'"
                                                onmouseout="this.style.backgroundColor='#FFF';this.style.color='#000'"
                                                onclick="return copytext('{{ $password->decrypt($password->password) }}')"
                                                title="Copiar"
                                                style="width: 40px; border:2px solid rgb(43,43,58); border-radius:4px; transition: 0.2s">C</button>
                                        </td>
                                        <td><a href="{{ route('password.edit', ['password' => $password]) }}">Editar</a>
                                        </td>
                                        <td>
                                            <form id="form_{{ $password->id }}" method="POST"
                                                action="{{ route('password.destroy', ['password' => $password]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#"
                                                    onclick="document.getElementById('form_{{ $password->id }}').submit()">Apagar</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                        <br>
                        <br>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $passwords->previousPageUrl() }}"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $passwords->lastPage(); $i++)
                                    <li class="page-item {{ $passwords->currentPage() == $i ? 'active' : '' }}"><a
                                            class="page-link"
                                            href="{{ $passwords->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link" href="{{ $passwords->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    function copytext($password) {
        navigator.clipboard.writeText($password)
    }
</script>
