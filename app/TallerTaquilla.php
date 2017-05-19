<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TallerTaquilla extends Model
{
    protected $table = "taller_taquilla";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_taller',
		'id_taquilla',
		'cant',
		'prec',
		'desc'
	];
	protected $guarded=[

	];
}
