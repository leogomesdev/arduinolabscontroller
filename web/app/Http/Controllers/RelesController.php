<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use App\Rele;
use App\Lab;
use View;
use Session;
use Validator;

class RelesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	private $head = ['reles' => 'active'];

    private function rules($id = null){
        return  [
                    "name" => "required|unique:reles,name,$id",
                    "pin" => "required|unique:reles,pin,$id",
                    "lab_id" => "required|not_in:null"
                ];
    }

    private $messages = [
                            'name.required' => 'Insira o nome',
                            'pin.required' => 'Insira o pino',
                            'lab_id.not_in' => 'Selecione o laboratório',
                            'name.unique' => 'Esse nome já está em uso',
                            'pin.unique' => 'Esse pino já está em uso'
                          ];

    public function getIndex(){
    	$reles = Rele::orderBy('pin', 'asc')->get();
		$head = $this->head;
      	return view::make('reles.index', compact ('reles', 'head'));
    }

    public function getNew(){
        $labs = Lab::orderBy('number','asc')->get();
		$head = $this->head;
    	return view('reles.new-edit',compact('labs', 'head'));
    }

    public function postNew(Request $request){
    	$validator = Validator::make($request->all(),$this->rules(),$this->messages);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        $input = $request->all();
        $rele = New Rele($input);
        $rele->save();
        return Redirect('/reles')->with('sucesso', 'Cadastro efetuado com sucesso!');
    }

    public function getEdit($id){
        $rele = Rele::find($id);
        $labs = Lab::orderBy('number','asc')->get();
		$head = $this->head;
        return view('reles.new-edit', compact('rele','labs', 'head'));
    }

    public function postEdit(Request $request, $id){
        $validator = Validator::make($request->all(),$this->rules($id),$this->messages);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        $input = $request->all();
        $rele = Rele::find($id);
        $rele->update($input);
        return Redirect('/reles')->with('sucesso','Alteração efetuada com sucesso!');
    }

    public function getDelete($id){
        $rele = Rele::find($id);
        $rele->delete();
        return Redirect('/reles')->with('sucesso', 'Registro excluído com sucesso!');
    }
}
