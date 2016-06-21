<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use App\Computer;
use App\Lab;
use View;
use Session;

class ComputersController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
    	$computers = Computer::orderBy('name', 'asc')->get();
      	return view::make('computers.index', compact ('computers'));
    }

    public function getNew(){
        $labs = Lab::get();
    	return view('computers.new-edit',compact('labs'));
    }

    public function postNew(Request $request){
    	/*$validacao = Validator::make($request->all(),$this->regras,$this->mensagens);
	    if ($validacao->fails())
	    {
			return Redirect::back()->withErrors($validacao)->withInput($request->all());
	    }*/
        $input = $request->all();
        $computer = New Computer($input);
        $computer->save();
        return Redirect('/computers')->with('sucesso', 'Cadastro efetuado com sucesso!');
    }

    public function getEdit($id){
        $computer = Computer::find($id);
        //dd($computer->lab->id);
        $labs = Lab::get();
        return view('computers.new-edit', compact('computer','labs'));
    }

    public function postEdit(Request $request, $id){
        $input = $request->all();
        $computer = Computer::find($id);
        $computer->update($input);
        $mensagem = 'Alteração efetuada com sucesso!';
        return Redirect('/computers')->with('mensagem');
    }

    public function getDelete($id){
        $computer = Computer::find($id);
        $computer->delete();
        return Redirect('/computers')->with('sucesso', 'Registro excluído com sucesso!');
    }
}
