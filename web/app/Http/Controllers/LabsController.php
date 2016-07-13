<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use App\Lab;
use View;
use Session;

class LabsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
    	$labs = Lab::orderBy('number', 'asc')->get();
      	return view::make('labs.index', compact ('labs'));
    }

    public function getNew(){
    	return view('labs.new-edit');
    }

    public function postNew(Request $request){
    	/*$validacao = Validator::make($request->all(),$this->regras,$this->mensagens);
	    if ($validacao->fails())
	    {
			return Redirect::back()->withErrors($validacao)->withInput($request->all());
	    }*/
        $input = $request->all();
        $lab = New Lab($input);
        $lab->save();
        return Redirect('/labs')->with('sucesso', 'Cadastro efetuado com sucesso!');
    }

    public function getEdit($id){
        $lab = Lab::find($id);
        return view('labs.new-edit', compact('lab'));
    }

    public function postEdit(Request $request, $id){
        $input = $request->all();
        $lab = Lab::find($id);
        $lab->update($input);
        return Redirect('/labs')->with('sucesso','Alteração efetuada com sucesso!');
    }

    public function getDelete($id){
        $lab = Lab::find($id);
        $lab->delete();
        return Redirect('/labs')->with('sucesso', 'Registro excluído com sucesso!');
    }

    public function getPower($id){
        $lab = Lab::find($id);
        $lab->power();
        return Redirect::back()->with('sucesso', 'Comando de ligar enviado com sucesso!');
    }

    public function getShutdown($id){
        $lab = Lab::find($id);
        $lab->shutdown();
        return Redirect::back()->with('sucesso', 'Desligamento elétrico concluído. Baixe e execute o Script para desligar os computadores!');
    }
        
}
