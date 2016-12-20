<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TallerReserva extends Model
{
    protected $table = "taller_reserva";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_taller',
		'id_reserva',
		'cant',
		'prec',
		'desc'
	];
	protected $guarded=[

	];
}
