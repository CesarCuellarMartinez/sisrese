<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taquilla extends Model
{
    protected $table = "taquilla";
	protected $primaryKey ='id';
		
	protected $guarded=[
		'id_reserva',
		'fech',
		'come',
		'id_usua',
		'cant_adul',
		'cant_prof',
		'cant_nino',
		'prec_adul',
		'prec_prof',
		'prec_nino',
		'tota'
	];
}
