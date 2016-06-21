<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lab;

class Rele extends Model
{
    protected $table = 'reles';
	protected $primaryKey = 'id';
    //Proteger campos contra inserção manual de dados:
    protected $guarded = array('id');
	protected $fillable = ['pin','lab_id'];


    public function lab()
	{
		return $this->BelongsTo(Lab::class);
    }

}
