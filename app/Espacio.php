<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
   	protected $table = "espacios";
	protected $primaryKey ='id';
	protected $fillable=[
		'nomb',
		'desc',
		'capa',
		'condicion'
	];
	protected $guarded=[

	];
}
