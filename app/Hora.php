<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    protected $table = "horas";
	protected $primaryKey ='id';
	protected $fillable=[
		'hora_inic',
		'hora_fina',
		'id_horario',
		'condicion'
		
	];
	protected $guarded=[

	];
}
