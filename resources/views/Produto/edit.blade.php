@extends ('home/layout')

@section ('content')
<div class="container">
    <div class="form-group">
        <label class="form-label">ID</label>
        <input type="text" class="form-control" value={{$produto->id}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" value={{$produto->nome}}>
    </div>
    <div class="form-group">
        <label class="form-label">Preço</label>
        <input type="text" class="form-control" value={{$produto->preco}}>
    </div>
    <div class="form-group">
        <label for="id-input-tipo">Tipo</label>
        <select class="form-select" name="Tipo_Produtos_id" aria-label="Selecione um tipo">
            @foreach ($tipoProdutos as $tipoProduto)
                @if($tipoProduto->id == $produto->Tipo_Produtos_id)
                    <option value="{{$tipoProduto->id}}" selected>{{$tipoProduto->descricao}}</option>
                @else
                    <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label">Ingredientes</label>
        <input type="text" class="form-control" value={{$produto->ingredientes}}>
    </div>
    <div class="form-group">
        <label class="form-label">Url Image</label>
        <input type="text" class="form-control" value={{$produto->urlImage}}>
    </div>
    <div class="form-group">
        <label class="form-label">Updated At</label>
        <input type="text" class="form-control" value={{$produto->updated_at}}>
    </div>
    <div class="form-group">
        <label class="form-label">Created At</label>
        <input type="text" class="form-control" value={{$produto->created_at}}>
    </div>
    <div class="my-3">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{route("produto")}}" class="btn btn-primary">Voltar</a>
    </div>
</div>
@endsection