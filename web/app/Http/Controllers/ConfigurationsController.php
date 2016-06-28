<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use App\Configuration;
use View;
use Session;

class ConfigurationsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
    	$configuration = Configuration::get()->first();
        if(!isset($configuration))
        {
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
        $input = $request->all();
        $configuration = Configuration::find($id);
        $configuration->update($input);
        $mensagem = 'Alteração efetuada com sucesso!';
        return Redirect('/configurations')->with('mensagem');
    }
}
