<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use App\Rele;
use App\Lab;
use View;
use Session;

class RelesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
    	$reles = Rele::orderBy('pin', 'asc')->get();
      	return view::make('reles.index', compact ('reles'));
    }

    public function getNew(){
        $labs = Lab::get();
    	return view('reles.new-edit',compact('labs'));
    }

    public function postNew(Request $request){
    	/*$validacao = Validator::make($request->all(),$this->regras,$this->mensagens);
	    if ($validacao->fails())
	    {
			return Redirect::back()->withErrors($validacao)->withInput($request->all());
	    }*/
        $input = $request->all();
        $rele = New Rele($input);
        $rele->save();
        return Redirect('/reles')->with('sucesso', 'Cadastro efetuado com sucesso!');
    }

    public function getEdit($id){
        $rele = Rele::find($id);
        //dd($computer->lab->id);
        $labs = Lab::get();
        return view('reles.new-edit', compact('rele','labs'));
    }

    public function postEdit(Request $request, $id){
        $input = $request->all();
        $rele = Rele::find($id);
        $rele->update($input);
        $mensagem = 'Alteração efetuada com sucesso!';
        return Redirect('/reles')->with('mensagem');
    }

    public function getDelete($id){
        $rele = Rele::find($id);
        $rele->delete();
        return Redirect('/reles')->with('sucesso', 'Registro excluído com sucesso!');
    }
}
