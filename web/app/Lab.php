<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Computer;
use App\Configuration;
use App\Rele;
use Storage;
use File;
use Carbon\Carbon;

class Lab extends Model
{
    protected $table = 'labs';
	protected $primaryKey = 'id';
    protected $guarded = array('id');
	protected $fillable = ['number','linux_user','linux_password','windows_user','windows_password'];


    public function computers()
	{
		return $this->hasMany(Computer::class);
    }

    public function reles()
	{
		return $this->hasMany(Rele::class);
    }

    public function power()
    {
        $configuration = Configuration::get()->first();
        // Definir a porta onde o Arduino está conectado
        $port = $configuration->arduino_port;
        $delay =  $configuration->communication_delay;     
        // Configurar a velocidade de comunicação com a porta serial
        exec("MODE $port BAUD=9600 PARITY=n DATA=8 XON=on STOP=1");
        sleep($delay);
        // Iniciar a comunicação serial
        $fp = fopen($port, 'c+');

        // Enviar comandos para ligar cada Rele do Laboratório
        foreach($this->reles()->get() as $rele)
        {
            fwrite($fp, $rele->pin."_on");
            sleep($delay);
        }
        
        foreach($this->computers()->get() as $computer)
        {
            $MACinteiro = $computer->mac;
            $duplasdemac = explode(":", $MACinteiro);
            // Enviar cada parte do endereço MAC via Serial como um valor decimal
            foreach ($duplasdemac as $parte){
                $parte = hexdec($parte);
                fwrite($fp, $parte);
                sleep($delay);
            }

         }

         // Fechar a conexão Serial
        fclose($fp);
     }

    public function shutdown()
    {
    	$configuration = Configuration::get()->first();
    	// Definir a porta onde Arduino está conectado
        $port = $configuration->arduino_port;
        $delay =  $configuration->communication_delay;
        $public_path = $configuration->absolute_public_path;  
        // Configurar a velocidade de comunicação com a Porta Serial
        exec("MODE $port BAUD=9600 PARITY=n DATA=8 XON=on STOP=1");
        sleep($delay);
        // Iniciar a comunicação Serial
        $fp = fopen($port, 'c+');

        // Enviar comandos para desligar cada Relé do Laboratório
	     foreach($this->reles()->get() as $rele)
         {
         	fwrite($fp, $rele->pin."_off");
         	sleep($delay);
         }

        // Fechar a comunicação Serial
        fclose($fp);

        // Criar Script para desligar os computadores
        $text = "";
		foreach($this->computers()->get() as $computer)
		{
			$text = $text."Dim objShellUbuntu".$computer->id."\n";
			$text = $text."Dim objShellWindows".$computer->id."\n";
			$text = $text."Set objShellWindows".$computer->id." = WScript.CreateObject(\"WScript.Shell\")\n";
			$text = $text."objShellWindows".$computer->id.".Run \"\"\"".$configuration->psshutdown_path."\"\" -u ".$this->windows_user." -p ".$this->windows_password." \\\\".$computer->ip."\"\"\" , 2 \n";
			$text = $text."Set objShellUbuntu".$computer->id." = WScript.CreateObject(\"WScript.Shell\")\n";
			$text = $text."objShellUbuntu".$computer->id.".Run \"\"\"".$configuration->plink_path."\"\" -ssh ".$this->linux_user."@".$computer->ip." -pw ".$this->linux_password." sudo poweroff\"\"\" , 2 \n";
		}

        // Criar nome do arquivo e salvar este no caminho especificado
        $file_name = Carbon::now()->parse()->format('d-m-Y-H-i');
        $path = 'scripts/'.$file_name.'.vbs';
        File::put($path,$text);

        // Executar o script criado
        exec("\WINDOWS\system32\cmd.exe /c START ".$public_path."\scripts\\".$file_name.".vbs");

        // Apagar arquivos de scrits antigos (criados há mais de um dia)
        $this->remove_old_files();
    }

    private function remove_old_files()
    {
        // Localizar todos os arquivos existentes na pasta
        $files = Storage::disk('public')->allFiles('scripts');
        // Entrar em loop e verificar os arquivos modificados ontem:
        foreach ($files as $file)
        {
            // Localizar a data de criação do arquivo
            $time = Carbon::createFromTimestampUTC(Storage::disk('public')->lastModified($file));
            // Apagar o arquivo, se ele foi criado há mais de uma hora
            if($time <= (Carbon::now()->addHours(-1)))
            {
                Storage::disk('public')->delete($file);
            }

        }
    }

}
