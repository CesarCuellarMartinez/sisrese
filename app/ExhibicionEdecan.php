<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibicionEdecan extends Model
{
 	protected $table = "exhibicion_edecan";
	protected $primaryKey ='id';
	protected $fillable=[
		'id_exhibicion',
		'id_edecan',
		'cant'
	];
	protected $guarded=[

	];
}
