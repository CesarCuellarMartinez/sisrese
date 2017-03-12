<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibicionTaquilla extends Model
{
	protected $table = "exhibicion_taquilla";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_exhibicion',
		'id_taquilla',
		'cant',
		'prec',
		'desc'
	];
	protected $guarded=[

	];
}
