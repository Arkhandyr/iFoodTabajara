@extends ('home/layout')

@section ('content')
    <div class="container">
        <a class="btn btn-primary" href="{{route('tipoproduto.create')}}">Criar Tipo de Produto</a>
        <a class="btn btn-primary" href="/">Voltar</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoProdutos as $tipoProduto)
                    <tr>
                        <th scope="row"> {{$tipoProduto -> id}}</th>
                        <td>{{$tipoProduto -> descricao}}</td>
                        <td>
                            <a href="{{route("tipoproduto.show", $tipoProduto->id)}}" class="btn btn-primary">Mostrar</a>
                            <a href="{{route("tipoproduto.edit", $tipoProduto->id)}}" class="btn btn-secondary">Editar</a>
                            <a 
                                href="" 
                                class="btn btn-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#destroyModal"
                                value="{{route("tipoproduto.destroy", $tipoProduto->id)}}">
                                    Remover
                            </a>
                        </td>
                    </tr>
                @endforeach            
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="destroyModalLabel">Confirmar exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir este item?</p>
            </div>
            <div class="modal-footer bg-dark">
                <form action="/tipoproduto/4" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Confirmar">
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection