@extends ('home/layout')

@section ('content')
<div class="container">
    <div class="form-group">
        <label class="form-label">User ID</label>
        <input type="text" class="form-control" value={{$userInfo->Users_id}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Foto do usuário</label>
        <input type="text" class="form-control" value={{$userInfo->profileImg}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Status</label>
        <input type="text" class="form-control" value={{$userInfo->status}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Data de Nascimento</label>
        <input type="text" class="form-control" value={{$userInfo->dataNasc}} disabled>
    </div>
    <div class="form-group">
        <label class="form-label">Gênero</label>
        <input type="text" class="form-control" value={{$userInfo->genero}} disabled>
    </div>
    <div class="my-3">
        <a href="{{route("userinfo.edit", $userInfo->Users_id)}}" class="btn btn-secondary">Editar</a>               
        <a 
                href="" 
                class="btn btn-danger" 
                data-bs-toggle="modal" 
                data-bs-target="#destroyModal"
                value="{{route("userinfo.destroy", $userInfo->Users_id)}}">
                    Remover
            </a>
        <a href="/" class="btn btn-primary">Voltar</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
            <h5 class="modal-title" id="destroyModalLabel">Confirmar exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark">
                <p>Deseja realmente excluir este item?</p>
            </div>
            <div class="modal-footer bg-dark">
                <form action="{{route("userinfo.destroy", $userInfo->Users_id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Confirmar">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Alert -->
<?php 
            
if (isset($message)) {
?>
    <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
        <span>{{$message[0]}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
<?php
}
?>
@endsection