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
use DB;
use Carbon\Carbon;
use Response;
use Auth;
use Illuminate\Support\Collection;
class ReservaController extends Controller
{
    public function __construct(){

    }
    //private $id_hora;
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$reservas=DB::table('reservas as r')
    		->join('institutos as i','r.id_instituto','=','i.id')
    		->join('users as u','r.id_usua','=','u.id')
    		->select('r.id','r.fech','r.esta','i.nomb_inst','u.name')
    		->where('r.id','LIKE','%'.$query.'%')
    		->groupBy('r.id','r.fech','r.esta','i.nomb_inst','u.name')
    		->paginate(7);
    		return view('adminlte::reserva.reserva.index',["reservas"=>$reservas,"searchText"=>$query]);
    	}
    }
    public function seleccionarHoras(){
    	$horas=DB::table('horas')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.reserva.seleccionarHoras",["horas"=>$horas]);
    }
    public function create(Request $request){

    	$id_hora=$request->get('id_hora');
    	///Session::put('id_hora', 'id_hora');
    		$request->session()->put('id_hora', $id_hora);
    	$institutos=DB::table('institutos')->get();
    	$espacios=DB::table('espacios')->where('condicion','=','1')->get();
    	$exhibiciones=DB::table('exhibiciones')->where('condicion','=','1')->get();
    	$talleres=DB::table('talleres')->where('condicion','=','1')->get();
    	$paquetes=DB::table('paquete')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.reserva.create",["institutos"=>$institutos,"espacios"=>$espacios,"exhibiciones"=>$exhibiciones,"talleres"=>$talleres,"paquetes"=>$paquetes,"horas"=>$id_hora]);
    }
    public function store(ReservaFormRequest $request){
    	//try{
    		DB::beginTransaction();
    		$reserva=new Reserva;
    		$reserva->alim=$request->get('alim');
    		$reserva->bus=$request->get('bus');
    		$reserva->cant_adul=$request->get('cant_adul');
    		$reserva->cant_prof=$request->get('cant_prof');
    		$reserva->cant_nino=$request->get('cant_nino');
    		$reserva->id_instituto=$request->get('id_instituto');
    		$reserva->come=$request->get('come');
    		$reserva->desc=$request->get('desc');
    		$reserva->fech_rese=$request->get('fech_rese');
    		$reserva->info_cont=$request->get('info_cont');
    		$reserva->nomb_cont=$request->get('nomb_cont');
    		$reserva->prec_nino=$request->get('prec_nino');
    		$reserva->prec_prof=$request->get('prec_prof');
    		$reserva->prec_adul=$request->get('prec_adul');
    		$reserva->id_usua=Auth::id();
    		$reserva->esta="RESERVADO";
    		//$reserva->apro=1;
    		$mytime = Carbon::now('America/Lima');
    		$reserva->fech=$mytime->toDateTimeString();
    		$reserva->save();

    		$id_espacio=$request->get('id_espacio');
    		$cant_espacio=$request->get('cant_espacio');
    		$cont_espacio=0;
    		while ($cont_espacio < count($id_espacio)) {
    			$espacio_reserva= new EspacioReserva();
    			$espacio_reserva->id_reserva=$reserva->id;
    			$espacio_reserva->id_espacio=$id_espacio[$cont_espacio];
    			$espacio_reserva->cant=$cant_espacio[$cont_espacio];
    			$espacio_reserva->save();
    			$cont_espacio=$cont_espacio+1;
    		}

    		$id_exhibicion=$request->get('id_exhibicion');
    		$prec_exhibicion=$request->get('prec_exhibicion');
    		$cant_exhibicion=$request->get('cant_exhibicion');
    		$desc_exhibicion=$request->get('desc_exhibicion');
    		$cont_exhibicion=0;
    		while ($cont_exhibicion<count($id_exhibicion)) {
    			$exhibicion_reserva = new ExhibicionReserva();
    			$exhibicion_reserva->id_reserva=$reserva->id;
    			$exhibicion_reserva->id_exhibicion=$id_exhibicion[$cont_exhibicion];
    			$exhibicion_reserva->prec=$prec_exhibicion[$cont_exhibicion];
    			$exhibicion_reserva->cant=$cant_exhibicion[$cont_exhibicion];
    			$exhibicion_reserva->desc=$desc_exhibicion[$cont_exhibicion];
    			$exhibicion_reserva->save();
    			$cont_exhibicion=$cont_exhibicion+1;
    		}

    		//ESTO NOSE :V
    		//$id_hora=$request->get('id_hora');
    		$cont_hora=0;
    		$id_hora=$request->session()->get('id_hora');
    		while ($cont_hora<count($id_hora)) {
    			$hora_reserva = new HoraReserva();
    			$hora_reserva->id_reserva=$reserva->id;
    			$hora_reserva->id_hora=$id_hora[$cont_hora];
    			$hora_reserva->save();
    			$cont_hora=$cont_hora+1;
    		}

    		$id_paquete=$request->get('id_paquete');
    		$prec_paquete=$request->get('prec_paquete');
    		$desc_paquete=$request->get('desc_paquete');
    		$cant_paquete=$request->get('cant_paquete');
    		$cont_paquete=0;
    		while ($cont_paquete<count($id_paquete)) {
    			$paquete_reserva = new PaqueteReserva();
    			$paquete_reserva->id_reserva=$reserva->id;
    			$paquete_reserva->id_paquete=$id_paquete[$cont_paquete];
    			$paquete_reserva->prec=$prec_paquete[$cont_paquete];
    			$paquete_reserva->cant=$cant_paquete[$cont_paquete];
    			$paquete_reserva->desc=$desc_paquete[$cont_paquete];
    			$paquete_reserva->save();
    			$cont_paquete=$cont_paquete+1;
    		}

    		$id_taller=$request->get('id_taller');
    		$prec_taller=$request->get('prec_taller');
    		$cant_taller=$request->get('cant_taller');
    		$desc_taller=$request->get('desc_taller');
    		$cont_taller=0;
    		while ($cont_taller<count($id_taller)) {
    			$taller_reserva = new TallerReserva();
    			$taller_reserva->id_reserva=$reserva->id;
    			$taller_reserva->id_taller=$id_taller[$cont_taller];
    			$taller_reserva->prec=$prec_taller[$cont_taller];
    			$taller_reserva->cant=$cant_taller[$cont_taller];
    			$taller_reserva->desc=$desc_taller[$cont_taller];
    			$taller_reserva->save();
    			$cont_taller=$cont_taller+1;
    		}
    		DB::commit();
    	//}
    	//catch(\Exception $e){
    	//	DB::rollback();
    	//}
    	return redirect('reserva')->with('message','Se ha guardado exitosamente');
    }
    public function show($id){
    	$reserva=DB::table('reservas as r')
    		->join('institutos as i','r.id_instituto','=','i.id')
    		->join('users as u','r.id_usua','=','u.id')
    		->select('r.id','r.fech','r.esta','i.nomb_inst','u.name')
    		->where('r.id','=',$id)
    		->first();

    		$espacios=DB::table('espacio_reserva as er')
    		->join('espacios as e','er.id_espacio','e.id')
    		->select('e.nomb')
    		->where('er.id_reserva','=',$id)
    		->get();
    		return view("adminlte::reserva.reserva.show",["reserva"=>$reserva,"espacios"=>$espacios]);
    }
    public function destroy($id){
    	$reserva=Reserva::findOrFail($id);
    	$reserva->esta='CANCELADO';
    	$reserva->update();
    	return redirect('reserva')->with('message','Se cancelado con exito la reserva');
    }
}