@extends ('home/layout')

@section ('content')
<div class="container">
    <form action="{{route("tipoproduto.update", $tipoProduto->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" value={{$tipoProduto->id}} disabled>
            <div id="id" class="form-text">Não será necessário cadastrar um id</div>
        </div>
        <div class="form-group">
            <label for="id-input-descricao" class="form-label">Tipo</label>
            <input name="descricao" type="text" class="form-control" id="id-input-descricao" value={{$tipoProduto->descricao}} required>
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{route("tipoproduto")}}" class="btn btn-primary">Voltar</a>
        </div>
    </form>
</div>
@endsection