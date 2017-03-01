<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ReservaFormRequest;
use App\Http\Controllers\Session;
use App\Reserva;
use App\EspacioReserva;
use App\ExhibicionReserva;
use App\HoraReserva;
use App\PaqueteReserva;
use App\TallerReserva;
use App\Edecan;
use App\EspacioEdecan;
use App\ExhibicionEdecan;
use App\TallerEdecan;
use App\Hora;
use DB;
use Carbon\Carbon;
use Response;
use Auth;
use Illuminate\Support\Collection;
class EventoController extends Controller
{
    public function api()
    {
        $data = array(); //declaramos un array principal que va contener los datos
        $reservas =DB::table('reservas')->get();
        $count = count($reservas); //contamos los ids obtenidos para saber el numero exacto de eventos
 
        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "title"=>$reservas[$i]->id,
                "start"=>$reservas[$i]->fech_rese, //por el plugin asi que asignamos a cada uno el valor correspondiente
                "url"=>"http://localhost/sisrese/public/reserva/".$reservas[$i]->id
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }
 
        return response()->json($data); //para luego retornarlo y estar listo para consumirlo
 
    }
}
