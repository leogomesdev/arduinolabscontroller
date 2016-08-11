<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use App\Lab;
use View;
use Session;
use Validator;

class LabsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	private $head = ['labs' => 'active'];

    private function rules($id = null){
        return  [
                    "number" => "required|unique:labs,number,$id",
                    "linux_user" => "required",
                    "linux_password" => "required",
                    "windows_user" => "required",
                    "windows_password" => "required"
                ];
    }

    private $messages = [
                            'number.required' => 'Insira o nome',
                            'number.unique' => 'Esse número já está em uso',
                            'linux_user.required' => 'Insira o nome de usuário Linux',
                            'linux_password.required' => 'Insira a senha do usuário Linux',
                            'windows_user.required' => 'Insira o nome de usuário Windows',
                            'windows_password.required' => 'Insira a senha do usuário Windows'
                          ];

    public function getIndex(){
    	$labs = Lab::orderBy('number', 'asc')->get();
		$head = $this->head;
      	return view::make('labs.index', compact ('labs', 'head'));
    }

    public function getNew(){
		$head = $this->head;
    	return view('labs.new-edit', compact ('head'));
    }

    public function postNew(Request $request){
    	$validator = Validator::make($request->all(),$this->rules(),$this->messages);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        $input = $request->all();
        $lab = New Lab($input);
        $lab->save();
        return Redirect('/labs')->with('sucesso', 'Cadastro efetuado com sucesso!');
    }

    public function getEdit($id){
        $lab = Lab::find($id);
		$head = $this->head;
        return view('labs.new-edit', compact('lab', 'head'));
    }

    public function postEdit(Request $request, $id){
        $validator = Validator::make($request->all(),$this->rules($id),$this->messages);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
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
        $result = $lab->power();
        if ($result==true)
        {
            return Redirect::back()->with('sucesso', 'Comando de ligar o laboratório '.$lab->number.' enviado com sucesso!');
        }
        else
        {
            return Redirect::back()->withErrors(['erro'=>'Não foi possível conectar-se ao Arduino!']);
        }

    }

    public function getShutdown($id){
        $lab = Lab::find($id);
        $result = $lab->shutdown();
        if ($result==true)
        {
            return Redirect::back()->with('sucesso', 'Desligamento elétrico concluído. Iniciada a execução automática do Script para desligar os computadores do laboratório '.$lab->number);
        }
        else
        {
            return Redirect::back()->withErrors(['erro'=>'Não foi possível conectar-se ao Arduino!']);
        }

    }

}
