@extends ('home/layout')

@section ('content')
<div class="container">
    <div class="form-group">
        <label class="form-label">ID</label>
        <input type="text" class="form-control" value={{$tipoProduto->id}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Tipo</label>
        <input type="text" class="form-control" value={{$tipoProduto->descricao}}>
    </div>
    <div class="my-3">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{route("tipoproduto")}}" class="btn btn-primary">Voltar</a>
    </div>
</div>
@endsection