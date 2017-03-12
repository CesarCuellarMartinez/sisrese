<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\TipoUsuario;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'tipo',
    ];

    public function roles()
    {
            $rol = TipoUsuario::all();
           return  $rol;        
    }


    public function tieneRol($role)
    {
        


        /*if($this->roles()->where('name', $role)->first())
        {
            return true;
        }   
        return false;*/

    }
        
            
}
