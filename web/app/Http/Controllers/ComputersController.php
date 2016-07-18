<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use App\Computer;
use App\Lab;
use View;
use Session;
use Validator;

class ComputersController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    private function rules($id = null){
        return  [
                    "name" => "required|unique:computers,name,$id",
                    "ip" => "required|unique:computers,ip,$id",
                    "mac" => "required|unique:computers,mac,$id",
                    "lab_id" => "required|not_in:null",
                ];
    }

    private $messages = [
                            'name.required' => 'Insira o nome',
                            'ip.required' => 'Insira o ip',
                            'mac.required' => 'Insira o mac',
                            'lab_id.not_in' => 'Selecione o laboratório',
                            'name.unique' => 'Esse nome já está em uso',
                            'ip.unique' => 'Esse endereço IP já está em uso',
                            'mac.unique' => 'Esse endereço MAC já está em uso'
                          ];


    public function getIndex(){
    	$computers = Computer::orderBy('name', 'asc')->get();
      	return view::make('computers.index', compact ('computers'));
    }

    public function getNew(){
        $labs = Lab::orderBy('number','asc')->get();
    	return view('computers.new-edit',compact('labs'));
    }

    public function postNew(Request $request){
    	$validator = Validator::make($request->all(),$this->rules(),$this->messages);
	    if ($validator->fails())
	    {
			return Redirect::back()->withErrors($validator)->withInput($request->all());
	    }
        $input = $request->all();
        $computer = New Computer($input);
        $computer->save();
        return Redirect('/computers')->with('sucesso', 'Cadastro efetuado com sucesso!');
    }

    public function getEdit($id){
        $computer = Computer::find($id);
        $labs = Lab::orderBy('number','asc')->get();
        return view('computers.new-edit', compact('computer','labs'));
    }

    public function postEdit(Request $request, $id){

        $validator = Validator::make($request->all(),$this->rules($id),$this->messages);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $input = $request->all();

        $computer = Computer::find($id);
        $computer->update($input);
        return Redirect('/computers')->with('sucesso','Alteração efetuada com sucesso!');
    }

    public function getDelete($id){
        $computer = Computer::find($id);
        $computer->delete();
        return Redirect('/computers')->with('sucesso', 'Registro excluído com sucesso!');
    }
}
