@extends ('home/layout')

@section ('content')
<div class="container">
    <form action="{{route("userinfo.update", $userInfo->Users_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id-input-usersID">User ID</label>
            <input type="text" class="form-control" id="id-input-id" aria-describedby="idHelp" placeholder="{{$userInfo->Users_id}}" disabled>
          </div>
          <div class="form-group" style="margin-bottom:10px">
              <label for="id-input-profileImg">Foto do usuário</label>
              <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder="Digite o link da imagem">
          </div>
          <div class="form-group" style="margin-bottom:10px">
            <label for="id-input-dataNasc">Data de nascimento</label>
            <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder="YYYY-MM-DD">
          </div>
          <div class="form-group" style="margin-bottom:10px">
            <label for="id-input-genero">Gênero</label>
            <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder="M ou F">
          </div>
        <div class="my-3">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{route("tipoproduto")}}" class="btn btn-primary">Voltar</a>
        </div>
    </form>
</div>
@endsection