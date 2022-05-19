<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Cidade;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        $endereco = Endereco::all();

        return response()->json($endereco);
    }

    public function store(Request $request)
    {
        $request->validate([
            'logradouro' =>'required',
            'número' => 'required',
            'bairro' => 'required',
            'idcidade'=> 'required'
        ]);
        

         $endereco = new Endereco();
         $endereco->logradouro = $request->logradouro;
         $endereco->número = $request->número;
         $endereco->bairro = $request->bairro;
         $endereco->idcidade = $request->idcidade;

         if($endereco){
             $endereco->save();
         }

         return response()->json($endereco . 'msg' . ' Endereço criado com sucesso! '); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logradouro' =>'required',
            'número' => 'required',
            'bairro' => 'required',
            'idcidade'=> 'required'
        ]);
            $endereco = Endereco::find($id);
            $endereco->logradouro = $request->input('logradouro');
            $endereco->número = $request->input('número');
            $endereco->bairro = $request->input('bairro');
            $endereco->idcidade = $request->input('idcidade');

       $endereco->save();

       return response()->json($endereco . 'msg' . ' Endereço Atualizado com sucesso! ');
    }

    public function destroy($id)
    {
        $endereco = Endereco::find($id);
        $endereco->delete();

        return response()->json($endereco . 'msg' . ' Endereço deletado com sucesso! ');
    }

    public function listar()
    {
        $cidade = Cidade::all();

        return response()->json($cidade);
    }

}
