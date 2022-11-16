@extends ('home/layout')

@section ('content')
<div class="container">
    <form action="{{route("endereco.update", $endereco->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" value="{{$endereco->id}}" disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" value="{{$endereco->bairro}}">
        </div>
        <div class="form-group">
            <label class="form-label">Logradouro</label>
            <input type="text" class="form-control" value="{{$endereco->logradouro}}">
        </div>
        <div class="form-group">
            <label class="form-label">Numero</label>
            <input type="text" class="form-control" value="{{$endereco->numero}}">
        </div>
        <div class="form-group">
            <label class="form-label">Complemento</label>
            <input type="text" class="form-control" value="{{$endereco->complemento}}">
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{route("endereco")}}" class="btn btn-primary">Voltar</a>
        </div>
    </form>
</div>
@endsection