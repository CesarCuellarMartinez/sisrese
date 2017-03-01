<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
	protected $table = "institutos";
	protected $primaryKey ='id';
	protected $fillable=[
		'nomb_inst',
		'nomb_cont',
		'tele_inst',
		'tele_cont',
		'corr_inst',
		'corr_cont',
		'condicion',
		'codi'
	];
	protected $guarded=[

	];


}
