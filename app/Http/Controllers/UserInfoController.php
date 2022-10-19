<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserInfoController extends Controller
{
    public function create()
    {
        return view("UserInfo/create");
    }

    public function store(Request $request)
    {
        try 
        {
            $userInfo = new UserInfo();
            $userInfo->Users_id = 1;
            $userInfo->status = 'A';
            $userInfo->profileImg = $request->profileImg;
            $userInfo->dataNasc = $request->dataNasc;
            $userInfo->genero = $request->genero;
            $userInfo->save();
            
            return view("UserInfo/show")
                                ->with('userInfo', $userInfo)
                                ->with('message', ["Informações de usuário criadas com sucesso", 'success']);
        } 
        catch (\Throwable $th) 
        {
            return view("UserInfo/show")
                                ->with('userInfo', $userInfo)
                                ->with('message', ['As informações deste usuário já foram cadastradas.', 'danger']);
        }   
    }

    public function show($id)
    {
        $userInfo = UserInfo::where('Users_id', $id)->first();

        if(isset($userInfo)){
            return view("UserInfo/show")->with("userInfo", $userInfo);
        }
        
        return view('UserInfo/create');
    }

    public function edit($id)
    {
        $userInfos = UserInfo::find($id);

        if(isset($userInfos)) {
            return view("UserInfo/edit")
                ->with("userInfo", $userInfos);
        }

        echo "Usuário não encontrado";
    }

    public function update(Request $request, $id)
    {
        $userInfos = UserInfo::find($id);

        if(isset($userInfos)){
            $userInfos->profileImg = $request->profileImg;
            $userInfos->dataNasc = $request->dataNasc;
            $userInfos->genero = $request->genero;
            $userInfos->update();

            echo "Informações de usuário atualizadas com sucesso";
        }
    }

    public function destroy($id)
    {
        $userInfos = UserInfo::find($id);

            if(isset($userInfos)) {
                $userInfos->delete();
                return \Redirect::route('userinfo.create');
            }

            echo "Usuário não encontrado";
    }
}
