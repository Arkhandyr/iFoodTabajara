@extends ('home/layout')

@section ('content')
<div class="container">
    <div class="form-group">
        <label class="form-label">ID</label>
        <input type="text" class="form-control" value={{$produto->id}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" value={{$produto->nome}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Preço</label>
        <input type="text" class="form-control" value={{$produto->preco}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Tipo</label>
        <input type="text" class="form-control" value={{$produto->descricao}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Ingredientes</label>
        <input type="text" class="form-control" value={{$produto->ingredientes}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Url Image</label>
        <input type="text" class="form-control" value={{$produto->urlImage}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Updated At</label>
        <input type="text" class="form-control" value={{$produto->updated_at}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Created At</label>
        <input type="text" class="form-control" value={{$produto->created_at}} disabled>
    </div>
    <div class="my-3">
        <a href="{{route("produto")}}" class="btn btn-primary">Voltar</a>
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