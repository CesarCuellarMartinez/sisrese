<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspacioEdecan extends Model
{
    protected $table = "espacio_edecan";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_espacio',
		'id_edecan',
		'cant',
	];
	protected $guarded=[

	];
}
