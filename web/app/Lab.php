<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Computer;
use App\Rele;

class Lab extends Model
{
    protected $table = 'labs';
	protected $primaryKey = 'id';
    //Proteger campos contra inserção manual de dados:
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
}
