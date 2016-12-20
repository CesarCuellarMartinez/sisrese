<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibicionReserva extends Model
{
	protected $table = "exhibicion_reserva";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_exhibicion',
		'id_reserva',
		'cant',
		'prec',
		'desc'
	];
	protected $guarded=[

	];
}
