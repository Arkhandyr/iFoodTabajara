@extends ('home/layout')

@section ('content')
    <div class="container">
        <a class="btn btn-primary" href="{{route('produto.create')}}">Criar Produto</a>
        <a class="btn btn-primary" href="/">Voltar</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <th type="linha" scope="row"> {{$produto -> id}}</th>
                        <td>{{$produto -> nome}}</td>
                        <td>{{$produto -> preco}}</td>
                        <td>{{$produto -> descricao}}</td>
                        <td>
                            <a href="{{route("produto.show", $produto->id)}}" class="btn btn-primary">Mostrar</a>
                            <a href="{{route("produto.edit", $produto->id)}}" class="btn btn-secondary">Editar</a>
                            <a 
                                href="" 
                                class="btn btn-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#destroyModal"
                                value="{{route("produto.destroy", $produto->id)}}">
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
                <form action="/produto/4" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Confirmar">
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection