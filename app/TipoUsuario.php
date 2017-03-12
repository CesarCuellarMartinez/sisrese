<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
     protected $table = "tipos_usuario";
	protected $primaryKey ='id';
	protected $fillable=[
		'id',
		'tipo',
		'desc'
		
	];
	protected $guarded=[

	];

	
}
