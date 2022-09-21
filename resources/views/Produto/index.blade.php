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
                            <a href="#" class="btn btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach            
            </tbody>
        </table>
    </div>
@endsection