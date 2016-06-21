<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lab;

class Computer extends Model
{
    protected $table = 'computers';
	protected $primaryKey = 'id';
    //Proteger campos contra inserção manual de dados:
    protected $guarded = array('id');
	protected $fillable = ['name','ip','mac','lab_id'];


    public function lab()
	{
		return $this->BelongsTo(Lab::class);
    }

}
