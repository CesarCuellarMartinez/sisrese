<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspacioReserva extends Model
{
    protected $table = "espacio_reserva";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_espacio',
		'id_reserva',
		'cant',
	];
	protected $guarded=[

	];
}
