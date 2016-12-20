<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reservas";
	protected $primaryKey ='id';
	protected $fillable=[
		'alim',
		'apro',
		'bus',
		'cant_adul',
		'cant_prof',
		'cant_nino',
		'id_instituto',
		'come',
		'desc',
		'esta',
		'fech',
		'fech_rese',
		'info_cont',
		'nomb_cont',
		'prec_nino',
		'tota',
		'id_coor',
		'id_usua',
		'prec_profe',
		'prec_adul',
	];
	protected $guarded=[

	];
}
