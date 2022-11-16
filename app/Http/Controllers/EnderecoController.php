<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try 
        {
            $enderecos = DB::select('SELECT ENDERECOS.ID as id,
                                            ENDERECOS.BAIRRO as bairro,
                                            ENDERECOS.LOGRADOURO as logradouro,
                                            ENDERECOS.NUMERO as numero,
                                            ENDERECOS.COMPLEMENTO as complemento,
                                            USER_INFOS.USERS_ID as users_id
                                    FROM ENDERECOS
                                    JOIN USER_INFOS 
                                    ON ENDERECOS.USERS_ID = USER_INFOS.USERS_ID;');
        } 
        catch (\Throwable $th) 
        {
            return view("Endereco/index")->with("enderecos", [])->with("message", [$th->getMessage(), "danger"]);
        }
        return view("Endereco/index")->with("enderecos", $enderecos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Endereco/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try 
        {
            $endereco = new Endereco();
            $endereco->Users_id = 1;
            $endereco->bairro = $request->bairro;
            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->save();
            
            return view("Endereco/show")
                                ->with('endereco', $endereco)
                                ->with('message', ["Endereço criado com sucesso", 'success']);
        } 
        catch (\Throwable $th) 
        {
            return view("Endereco/show")
                                ->with('endereco', $endereco)
                                ->with('message', ['Esse endereço já foi cadastrado.', 'danger']);
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endereco = Endereco::where('Id', $id)->first();

        if(isset($endereco)){
            return view("Endereco/show")->with("endereco", $endereco);
        }
        
        return view('Endereco/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco = Endereco::find($id);

        if(isset($endereco)) {
            return view("Endereco/edit")
                ->with("endereco", $endereco);
        }

        echo "Endereço não encontrado";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $endereco = Endereco::find($id);

        if(isset($endereco)){
            $endereco->bairro = $request->bairro;
            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->update();
            
            echo "Endereço atualizado com sucesso";
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco = UserInfo::find($id);

            if(isset($endereco)) {
                $endereco->delete();
                return \Redirect::route('endereco.create');
            }

            echo "Endereço não encontrado";
    }
}
