<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibicion extends Model
{
    	protected $table = "exhibiciones";
	protected $primaryKey ='id';
	protected $fillable=[
		'nomb',
		'desc',
		'capa',
		'prec',
		'condicion'
	];
	protected $guarded=[

	];
}
