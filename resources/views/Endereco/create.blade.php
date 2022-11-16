@extends ('home/layout')

@section ('content')
    <div class="container">
        <form method="POST" action="{{route('endereco.store')}}">
            @csrf
            <h1>Cadastrar novo endereço</h1>
            <div class="form-group">
              <label for="id-input-id">ID</label>
              <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
              <small id="emailHelp" class="form-text text-muted">Não é necessário cadastrar o ID para cadastrar um novo dado.</small>
            </div>
            <div class="form-group">
                <label for="id-input-bairro">Nome</label>
                <input name="bairro" type="text" class="form-control" id="id-input-bairro" placeholder="Digite o bairro">
              </div>
            <div class="form-group">
              <label for="id-input-logradouro">Logradouro</label>
              <input name="logradouro" type="text" class="form-control" id="id-input-logradouro" placeholder="Digite o logradouro">
            </div>
            <div class="form-group">
                <label for="id-input-numero">Numero</label>
                <input name="numero" type="text" class="form-control" id="id-input-numero" placeholder="Digite o número">
              </div>
            <div class="form-group">
                <label for="id-input-complemento">Complemento</label>
                <input name="complemento" type="text" class="form-control" id="id-input-complemento" placeholder="Digite o complemento">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-primary" href="\endereco">Voltar </a>
          </form>
    </div>
@endsection