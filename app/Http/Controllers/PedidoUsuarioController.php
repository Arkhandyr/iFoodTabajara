<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 

class PedidoUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index() {
        return view("PedidoUsuario/index");
    }

    public function getProdutos($id) {
        //se o $id buscado for menor que 1 então ele é inválido, sendo assim busca tudo
        if($id < 1)
            $produtos = DB::select("SELECT Produtos.*, TipoProdutos.descricao
                                    FROM Produtos
                                    JOIN Tipo_Produtos on Produtos.TipoProdutos_id == TipoProdutos.id");
        else
            $produtos = DB::select("SELECT Produtos.*, TipoProdutos.descricao
                                    FROM Produtos
                                    JOIN Tipo_Produtos on Produtos.TipoProdutos_id == TipoProdutos.id
                                    WHERE Produtos.Tipo_Produtos_id == ?", [$id]);

        $response["success"] = true;
        $response["message"] = "Consulta de tipo realizada com sucesso";
        $response["return"] = $produtos;

        return response()->json($response, 201);

    }
}
