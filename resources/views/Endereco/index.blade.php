@extends ('home/layout')

@section ('content')
    <div class="container">
        <a class="btn btn-primary" href="{{route('endereco.create')}}">Criar Endereço</a>
        <a class="btn btn-primary" href="/">Voltar</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Número</th>
                    <th scope="col">Complemento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enderecos as $endereco)
                    <tr>
                        <th type="linha" scope="row"> {{$endereco -> id}}</th>
                        <td>{{$endereco -> bairro}}</td>
                        <td>{{$endereco -> logradouro}}</td>
                        <td>{{$endereco -> numero}}</td>
                        <td>{{$endereco -> complemento}}</td>
                        <td>
                            <a href="{{route("endereco.show", $endereco->id)}}" class="btn btn-primary">Mostrar</a>
                            <a href="{{route("endereco.edit", $endereco->id)}}" class="btn btn-secondary">Editar</a>
                            <a 
                                href="" 
                                class="btn btn-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#destroyModal"
                                value="{{route("endereco.destroy", $endereco->id)}}">
                                    Remover
                            </a>
                        </td>
                    </tr>
                @endforeach            
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir este item?</p>
            </div>
            <div class="modal-footer bg-dark">
                <form action="/endereco/1" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Confirmar">
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Alert -->
    {{-- <?php $message = ["Mensagem a ser exibida, "danger"] ?> --}}

    @if (isset($message))
        <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
            <span>{{$message[0]}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif
    
@endsection