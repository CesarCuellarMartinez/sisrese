<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = "horarios";
	protected $primaryKey ='id';
	protected $fillable=[
		'desc',
		'condicion'
		
		
	];
	protected $guarded=[

	];
}
