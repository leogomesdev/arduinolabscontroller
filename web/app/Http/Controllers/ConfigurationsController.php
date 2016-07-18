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

    private $rules = [
                   "plink_path" => "required",
                    "psshutdown_path" => "required",
                    "arduino_port" => "required",
                    "communication_delay" => "required"
            ];
    

    private $messages = [
                            'plink_path.required' => 'Insira o caminho de instalação do PLink',
                            'psshutdown_path.required' => 'Insira o caminho de instalação do PsShutdown',
                            'arduino_port.required' => 'Insira a porta de conexão com o Arduino',
                            'communication_delay.required' => 'Insira o tempo de pausa entre as comunicações com o Arduino'
                          ];


    public function getIndex(){
    	$configuration = Configuration::get()->first();
        if(!isset($configuration))
        {
            //Cria configurações padrão
            $configuration = new Configuration(
                                                ['plink_path' => 'C:\Program files (x86)\puTTY\plink.exe',
                                                'psshutdown_path' => 'C:\Program files (86)\PSTools\psshutdown.exe',
                                                'arduino_port' => 'COM4',
                                                'communication_delay' => '2',
                                                ]
                                              );
            $configuration->save();
        }
      	return view::make('configurations.index', compact ('configuration'));
    }

    public function getEdit($id){
        $configuration = Configuration::find($id);
        return view('configurations.edit', compact('configuration'));
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
