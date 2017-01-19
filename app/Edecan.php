<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edecan extends Model
{
	protected $table = "edecanes";
	protected $primaryKey ='id';
		
	protected $guarded=[
		'id_reserva',
		'fech',
		'come',
		'id_usua',
		'cant_adul',
		'cant_prof',
		'cant_nino'
	];
}
