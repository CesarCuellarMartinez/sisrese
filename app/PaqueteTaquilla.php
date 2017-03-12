<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaqueteTaquilla extends Model
{
    protected $table = "paquete_taquilla";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_paquete',
		'id_taquilla',
		'cant',
		'prec',
		'desc'
	];
	protected $guarded=[

	];
}
