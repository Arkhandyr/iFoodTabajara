@extends ('home/layout')

@section ('content')
    <div class="container">
        <form method="POST" action="{{route('userinfo.store')}}">
            @csrf 
            <h1>Cadastrar informações de usuário</h1>
            <div class="form-group">
              <label for="id-input-usersID">User ID</label>
              <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="#" disabled>
              <small id="emailHelp" class="form-text text-muted">Não é necessário cadastrar o ID.</small>
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label for="id-input-profileImg">Foto do usuário</label>
                <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder="Digite o link da imagem">
            </div>
            <div class="form-group">
              <label for="id-input-status">Status</label>
              <input type="text" class="form-control" id="id-input-status" aria-describedby="idHelp" placeholder="#" disabled>
              <small id="emailHelp" class="form-text text-muted">O status não é controlado pelo usuário.</small>
            </div>
            <div class="form-group" style="margin-bottom:10px">
              <label for="id-input-dataNasc">Data de nascimento</label>
              <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder="YYYY-MM-DD">
            </div>
            <div class="form-group" style="margin-bottom:10px">
              <label for="id-input-genero">Gênero</label>
              <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder="M ou F">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-primary" href="\">Voltar </a>
          </form>
    </div>
@endsection