<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table ='paquetes';
    protected $primaryKey = 'id';
    protected $fillable =[
    	'desc',
    	'prec'

    ];

    protected $guarded =[
    	
    ];
}
