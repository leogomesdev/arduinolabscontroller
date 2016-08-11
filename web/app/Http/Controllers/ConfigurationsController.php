<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use App\Configuration;
use View;
use Session;
use Validator;

class ConfigurationsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	private $head = ['configurations' => 'active'];

    private $rules = [
                   "plink_path" => "required",
                    "psshutdown_path" => "required",
                    "absolute_public_path" => "required",
                    "arduino_port" => "required",
                    "communication_delay" => "required"
            ];


    private $messages = [
                        'plink_path.required' => 'Insira o caminho de instalação do PLink',
                        'psshutdown_path.required' => 'Insira o caminho de instalação do PsShutdown',
                        'absolute_public_path.required' => 'Insira o caminho absoluto da pasta public do projeto',
                        'arduino_port.required' => 'Insira a porta de conexão com o Arduino',
                        'communication_delay.required' => 'Insira o tempo de pausa entre as comunicações com o Arduino'
                        ];


    public function getIndex(){
    	$configuration = Configuration::get()->first();
        if(!isset($configuration))
        {
            // Criar configurações padrão, caso não estejam definidas
            $configuration = new Configuration(Configuration::getDefault());
            $configuration->save();
        }
		$head = $this->head;
      	return view::make('configurations.index', compact ('configuration', 'head'));
    }

    public function getEdit($id){
        $configuration = Configuration::find($id);
		$head = $this->head;
        return view('configurations.edit', compact('configuration', 'head'));
    }

    public function postEdit(Request $request, $id){
        $validator = Validator::make($request->all(),$this->rules,$this->messages);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        $input = $request->all();
        $configuration = Configuration::find($id);
        $configuration->update($input);
        return Redirect('/configurations')->with('sucesso','Alteração efetuada com sucesso!');
    }
}
