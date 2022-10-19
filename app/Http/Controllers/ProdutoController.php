<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index()
    {
        try 
        {
            $produtos = DB::select('SELECT PRODUTOS.ID as id,
                                            PRODUTOS.NOME as nome,
                                            PRODUTOS.PRECO as preco,
                                            TIPO_PRODUTOS.DESCRICAO as descricao
                                    FROM PRODUTOS
                                    JOIN TIPO_PRODUTOS 
                                    ON PRODUTOS.TIPO_PRODUTOS_ID = TIPO_PRODUTOS.ID;');
        } 
        catch (\Throwable $th) 
        {
            return view("Produto/index")->with("produtos", [])->with("message", [$th->getMessage(), "danger"]);
        }
        return view("Produto/index")->with("produtos", $produtos);
    }

    public function indexMessage($message)
    {
        try 
        {
            $produtos = DB::select('SELECT Produtos.id,
                                       Produtos.nome,
                                       Produtos.preco,
                                       Tipo_Produtos.descricao,
                                       Produtos.ingredientes,
                                       Produtos.urlImage,
                                       Produtos.updated_at,
                                       Produtos.created_at
                                FROM Produtos
                                JOIN TIPO_PRODUTOS on Produtos.Tipo_Produtos_id = Tipo_Produtos.id');
        } 
        catch (\Throwable $th) 
        {
            return view("Produto/index")->with("produtos", [])->with("message", [$th->getMessage(), "danger"]);
        }
        return view("Produto/index")->with("produtos", $produtos)->with("message", $message);
    }

    public function create()
    {
        try 
        {
            $tipoProdutos = DB::select('SELECT * FROM TIPO_PRODUTOS');
        } 
        catch (\Throwable $th) 
        {
            return $this->indexMessage( [$th->getMessage(), "danger"] );
        }
        return view("Produto/create")->with("tipoProdutos", $tipoProdutos);
    }

    public function store(Request $request)
    {
        try 
        {
            $tipoProduto = new Produto();
            $tipoProduto->nome = $request->nome;
            $tipoProduto->preco = $request->preco;
            $tipoProduto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $tipoProduto->ingredientes = $request->ingredientes;
            $tipoProduto->urlImage = $request->urlImage;
            $tipoProduto->save();
            return $this->index();
        } 
        catch (\Throwable $th) 
        {
            // Mensagem de erro
            return $this->indexMessage( [$th->getMessage(), "danger"] );
        }
        //Mensagem de sucesso
        return $this->indexMessage( ["Produto cadastrado com sucesso", "success"] );
    }

    public function show($id)
    {
        try 
        {
            $produtos = DB::select("SELECT Produtos.id,
                                            Produtos.nome,
                                            Produtos.preco,
                                            Produtos.Tipo_Produtos_id,
                                            Tipo_Produtos.descricao,
                                            Produtos.ingredientes,
                                            Produtos.urlImage,
                                            Produtos.updated_at,
                                            Produtos.created_at
                                    FROM Produtos
                                    JOIN TIPO_PRODUTOS on Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                    WHERE Produtos.id = ?", [$id]);

            if(count($produtos) > 0) {
                return view("Produto/show")->with("produto", $produtos[0]);
            }

            return $this->indexMessage(["Produto não encontrado", "warning"]);
        }
        catch(\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
        
        // O DB SELECT sempre retorna um array [obj], [obj, obj, ....] ou []

        //$produto = Produto::find($id); // Retorna um objeto ou null
        //dd($produto);

        // Mando carregar a view show de Produto, 
        // criando dentro dela um objeto chamado "produto"
        // com o conteúdo de $produto que está no controlador
        if(count($produtos) > 0)
            return view("Produto/show")->with("produto", $produtos[0]);
        // TODO: Implementar mensagens de erro.
        echo "Produto não encontrado";
    }

    public function edit($id)
    {
        try
        {
            $produto = Produto::find($id);

            if(isset($produto)) {
                $tipoProdutos = TipoProduto::all();
                return view("Produto/edit")
                    ->with("produto", $produto)
                    ->with("tipoProdutos", $tipoProdutos);
            }
        
            return $this->indexMessage(["Produto não encontrado", "warning"]);
        }
        catch(\Throwable $th) 
        {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
        
    }

    public function update(Request $request, $id)
    {
        try
        {
            $produto = Produto::find($id); // retorna um obj ou null
            // Dentro dessa variável eu já tenho o produto que eu quero atualizar
    
            // Pergunto se o obj é válido ou null (se ele existe)
            if( isset($produto) ){
                $produto->nome = $request->nome;
                $produto->preco = $request->preco;
                $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
                $produto->ingredientes = $request->ingredientes;
                $produto->urlImage = $request->urlImage;
                $produto->update();
                // Recarregar a view index.
                return $this->indexMessage(["Produto atualizado com sucesso", "success"]);
            }
            
            return $this->indexMessage(["Produto não encontrado", "warning"]);
        }
        catch(\Throwable $th) 
        {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    public function destroy($id)
    {
        try
        {
            $produto = Produto::find($id);

            if(isset($produto)) {
                $produto->delete();
                return \Redirect::route('produto');
            }
            
            return $this->indexMessage(["Produto não encontrado", "warning"]);
        }
        catch(\Throwable $th) 
        {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }
}