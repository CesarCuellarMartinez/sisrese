<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoraReserva extends Model
{
   	protected $table = "hora_reserva";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_hora',
		'id_reserva'
	];
	protected $guarded=[

	];
}
