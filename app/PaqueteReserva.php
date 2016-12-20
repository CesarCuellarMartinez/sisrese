<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaqueteReserva extends Model
{
    protected $table = "paquete_reserva";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_paquete',
		'id_reserva',
		'cant',
		'prec',
		'desc'
	];
	protected $guarded=[

	];
}
