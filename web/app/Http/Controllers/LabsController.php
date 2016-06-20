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
    	$laboratorios = Lab::orderBy('number', 'asc')->get();
      	return view::make('laboratorios.index', compact ('laboratorios'));
    }

    public function getCadastrar(){
    	return view('laboratorios.new-edit');
    }

    public function postCadastrar(Request $request){
    	/*$validacao = Validator::make($request->all(),$this->regras,$this->mensagens);
	    if ($validacao->fails())
	    {
			return Redirect::back()->withErrors($validacao)->withInput($request->all());
	    }*/
        $input = $request->all();
        $laboratorio = New Lab($input);
        $laboratorio->save();
        return Redirect('/laboratorios')->with('sucesso', 'Cadastro efetuado com sucesso!');
    }

    public function getEditar($id){
        $laboratorio = Lab::find($id);
        return view('laboratorios.new-edit', compact('laboratorio'));
    }

    public function postEditar(Request $request, $id){
        $input = $request->all();
        $laboratorio = Lab::find($id);
        $laboratorio->update($input);
        $mensagem = 'Alteração efetuada com sucesso!';
        return Redirect('/laboratorios')->with('mensagem');
    }

    public function getApagar($id){
        $laboratorio = Lab::find($id);
        $laboratorio->delete();
        return Redirect('/laboratorios')->with('sucesso', 'Registro excluído com sucesso!');
    }


     public function getDesligar()
     {

      header('Content-Disposition: attachment; filename="script.vbs"');
      header("Cache-control: private");
      header("Content-transfer-encoding: binary\n");

      echo "Dim lab\n";
      echo "lab = InputBox(\"Insira o numero do laboratorio a ser desligado\")\n";

      exit;
     }


     public function getLigar()
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
