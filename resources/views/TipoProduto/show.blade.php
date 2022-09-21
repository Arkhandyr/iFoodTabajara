@extends ('home/layout')

@section ('content')
<div class="container">
    <div class="form-group">
        <label class="form-label">ID</label>
        <input type="text" class="form-control" value={{$produto->id}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Descrição</label>
        <input type="text" class="form-control" value={{$produto->descricao}} disabled>
    </div>
    <div class="my-3">
        <a href="{{route("produto")}}" class="btn btn-primary">Voltar</a>
    </div>
</div>
@endsection