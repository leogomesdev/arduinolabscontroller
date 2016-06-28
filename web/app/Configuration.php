<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Configuration;

class Configuration extends Model
{
    protected $table = 'configurations';
	protected $primaryKey = 'id';
    protected $guarded = array('id');
	protected $fillable = ['plink_path','psshutdown_path','arduino_port','communication_delay'];

}
