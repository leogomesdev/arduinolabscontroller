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
        $mensagem = 'Alteração efetuada com sucesso!';
        return Redirect('/labs')->with('mensagem');
    }

    public function getDelete($id){
        $lab = Lab::find($id);
        $lab->delete();
        return Redirect('/labs')->with('sucesso', 'Registro excluído com sucesso!');
    }


     public function getShutdown()
     {

      header('Content-Disposition: attachment; filename="script.vbs"');
      header("Cache-control: private");
      header("Content-transfer-encoding: binary\n");

      echo "Dim lab\n";
      echo "lab = InputBox(\"Insira o numero do lab a ser desligado\")\n";

      exit;
     }


     public function getPower()
     {
        // Define porta onde arduino está conectado
        $port = "COM4";          
        // Configura velocidade de comunicação com a porta serial
        exec("MODE $port BAUD=9600 PARITY=n DATA=8 XON=on STOP=1");
        // PC 5
        sleep(2);
        // Inicia comunicação serial
        $fp = fopen($port, 'c+');
        // PC 5
        sleep(2);
        echo("Me conectei ao Arduino via Serial e estou enviando um endereco MAC. <br />");
        //$MACinteiro = "00-29-125-252-26-52";
        $MACinteiro = "00:1D:7D:FC:1A:34";
        $duplasdemac = explode(":", $MACinteiro);
        foreach ($duplasdemac as $parte){
            $parte = hexdec($parte);
            fwrite($fp, $parte);
            sleep(2);
            echo($parte);
            echo("-");
        }
        sleep(2);
        fwrite($fp, "1_off");
        sleep(2);
        fwrite($fp, "2_off");
        sleep(2);
        fwrite($fp, "3_off");
        sleep(2);
        fwrite($fp, "4_off");
        sleep(2);
     }
}
