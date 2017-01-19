<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TallerEdecan extends Model
{
	protected $table = "taller_edecan";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_taller',
		'id_edecan',
		'cant'
	];
	protected $guarded=[

	];
}
