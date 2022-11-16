@extends ('home/layout')

@section ('content')
<div class="container">
    <div class="form-group">
        <label class="form-label">ID</label>
        <input type="text" class="form-control" value="{{$endereco->id}}" disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Bairro</label>
        <input type="text" class="form-control" value="{{$endereco->bairro}}" disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Logradouro</label>
        <input type="text" class="form-control" value="{{$endereco->logradouro}}" disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Numero</label>
        <input type="text" class="form-control" value="{{$endereco->numero}}" disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Complemento</label>
        <input type="text" class="form-control" value="{{$endereco->complemento}}" disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Updated At</label>
        <input type="text" class="form-control" value="{{$endereco->updated_at}}" disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Created At</label>
        <input type="text" class="form-control" value="{{$endereco->created_at}}" disabled>
    </div>
    <div class="my-3">
        <a href="{{route("endereco")}}" class="btn btn-primary">Voltar</a>
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