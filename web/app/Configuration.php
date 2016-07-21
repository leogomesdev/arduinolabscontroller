<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Configuration;

class Configuration extends Model
{
    protected $table = 'configurations';
	protected $primaryKey = 'id';
    protected $guarded = array('id');
	protected $fillable = ['plink_path','psshutdown_path','absolute_public_path','arduino_port','communication_delay'];

	public static function getDefault()
	{
		return (['plink_path' => 'C:\Program files (x86)\puTTY\plink.exe',
                'psshutdown_path' => 'C:\Program files (x86)\PSTools\psshutdown.exe',
                'absolute_public_path' => 'C:\UwAmp\www\arduinolabscontroller\web\public',
                'arduino_port' => 'COM4',
                'communication_delay' => '2',
                ]);
	}
}
