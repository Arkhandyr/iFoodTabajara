@extends ('home/layout')

@section ('content')
    <div class="container">
        <form method="POST" action="{{route('tipoproduto.store')}}">
            @csrf 
            <h1>Cadastrar novo tipo de produto</h1>
            <div class="form-group">
              <label for="id-input-id">ID</label>
              <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
              <small id="emailHelp" class="form-text text-muted">Não é necessário cadastrar o ID para cadastrar um novo dado.</small>
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label for="id-input-nome">Descrição</label>
                <input name="nome" type="text" class="form-control" id="id-input-descricao" placeholder="Digite a Descrição">
              </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-primary" href="\tipoproduto">Voltar </a>
          </form>
    </div>
@endsection