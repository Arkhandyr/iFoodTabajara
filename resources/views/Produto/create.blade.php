@extends ('home/layout')

@section ('content')
    <div class="container">
        <form method="POST" action="{{route('produto.store')}}">
            @csrf
            <h1>Cadastrar novo produto</h1>
            <div class="form-group">
              <label for="id-input-id">ID</label>
              <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
              <small id="emailHelp" class="form-text text-muted">Não é necessário cadastrar o ID para cadastrar um novo dado.</small>
            </div>
            <div class="form-group">
                <label for="id-input-nome">Nome</label>
                <input name="nome" type="text" class="form-control" id="id-input-nome" placeholder="Digite o Nome">
              </div>
            <div class="form-group">
              <label for="id-input-preco">Preço</label>
              <input name="preco" type="text" class="form-control" id="id-input-preco" placeholder="Digite o preço">
            </div>
            <div>
                <label for="id-input-nome">Tipo do produto</label>
                <select name="Tipo_Produtos_id" class="form-select" aria-label="Default select example">
                    @foreach ($tipoProdutos as $tipoProduto)
                        <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="id-input-ingredientes">Ingredientes</label>
                <input name="ingredientes" type="text" class="form-control" id="id-input-ingredientes" placeholder="Digite os ingredientes">
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label for="id-input-urlImage">UrlImage</label>
                <input name="urlImage" type="text" class="form-control" id="id-input-urlImage" placeholder="Digite a url da Imagem">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-primary" href="\produto">Voltar </a>
          </form>
    </div>
@endsection