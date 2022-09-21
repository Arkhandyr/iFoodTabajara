<?php

namespace App\Http\Controllers;

use App\Models\TipoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoProdutoController extends Controller
{
    public function index()
    {
        $tipoProdutos = DB::select('SELECT * FROM TIPO_PRODUTOS');
        return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos);
    }

    public function create()
    {
        return view("TipoProduto/create");
    }

    public function store(Request $request)
    {
        $tipoProduto = new TipoProduto();
        $tipoProduto->descricao = $request->descricao;
        $tipoProduto->save();
        return $this->index();
    }

    public function show($id)
    {
        $produtos = DB::select("SELECT Tipo_Produtos.id,
                                       Tipo_Produtos.descricao
                                FROM Tipo_Produtos
                                WHERE Tipo_Produtos.id = ?", [$id]);
        // O DB SELECT sempre retorna um array [obj], [obj, obj, ....] ou []

        //$produto = Produto::find($id); // Retorna um objeto ou null
        //dd($produto);

        // Mando carregar a view show de Produto, 
        // criando dentro dela um objeto chamado "produto"
        // com o conteúdo de $produto que está no controlador
        if(count($produtos) > 0)
            return view("TipoProduto/show")->with("produto", $produtos[0]);
        // TODO: Implementar mensagens de erro.
        echo "TipoProduto não encontrado";
    }

    public function edit($id)
    {
        $tipoProduto = TipoProduto::find(1);

        if(isset($tipoProduto)) {
            return view("TipoProduto/edit")->with("tipoProduto", $tipoProduto);
        }
        //TODO: implementar tratamento de exceptions
        echo "TipoProduto não encontrado";
    }

    public function update(Request $request, $id)
    {
        //echo "Tipo $request->Tipo_Produtos_id";
        $tipoProduto = TipoProduto::find($id); // retorna um obj ou null
        // Dentro dessa variável eu já tenho o produto que eu quero atualizar

        // Pergunto se o obj é válido ou null (se ele existe)
        if( isset($tipoProduto) ){
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->update();
            // Recarregar a view index.
            return $this->index();
        }
        // Tratar exceptions futuramente
        echo "TipoProduto não encontrado";
    }

    public function destroy($id)
    {
        //
    }
}
