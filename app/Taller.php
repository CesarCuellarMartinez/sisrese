<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table = "talleres";
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
