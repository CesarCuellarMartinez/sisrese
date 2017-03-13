<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
     protected $table = "tipo_usuario";
	protected $primaryKey ='id';
	protected $fillable=[
		'id',
		'nom_tipo',
		'desc'
		
	];
	protected $guarded=[

	];

	
}
