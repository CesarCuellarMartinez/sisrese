<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\TaquillaFormRequest;
use App\Http\Controllers\Session;
use App\Taquilla;
use App\Reserva;
use App\PaqueteTaquilla;
use App\ExhibicionTaquilla;
use DB;
use Carbon\Carbon;
use Response;
use Auth;
use Illuminate\Support\Collection;
class TaquillaController extends Controller
{
     public function __construct(){

    }
     public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$taquillas=DB::table('taquilla as t')
    		->join('users as u','t.id_usua','=','u.id')
    		->join('reservas as s','t.id_reserva','=','s.id')
    		->select('t.id','t.fech','r.fech','r.id','u.name')
    		->where('r.id','LIKE','%'.$query.'%')
    		->groupBy('r.id','t.fech','u.name')
    		->paginate(7);
    		return view('adminlte::reserva.taquilla.index',["edecanes"=>$taquillas,"searchText"=>$query]);
    	}
    }
   /* public function seleccionarHoras(){
    	$horas=DB::table('horas')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.reserva.seleccionarHoras",["horas"=>$horas]);
    }*/
    public function create(Request $request){
        $id_reserva=$request->get('id');    	//Session::put('id_reserva', 'id_reserva');
    	$request->session()->put('id_reserva', $id_reserva);
    	$paquetes=DB::table('paquete')->where('condicion','=','1')->get();
    	$exhibiciones=DB::table('exhibiciones')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.taquilla.create",["exhibiciones"=>$exhibiciones,"paquetes"=>$paquetes,"id_reserva"=>$request]);
    }
    public function store(TaquillaFormRequest $request){
    	//try{
    		DB::beginTransaction();
    		$taquilla=new Taquilla;
    		$mytime = Carbon::now('America/Lima');
    		$taquilla->id_reserva=$request->session()->get('id_reserva');
    		$taquilla->fech=$mytime->toDateTimeString();
    		$taquilla->come=$request->get('come');
    		$taquilla->id_usua=Auth::id();
    		$taquilla->cant_nino=$request->get('cant_nino');
    		$taquilla->cant_prof=$request->get('cant_prof');
    		$taquilla->cant_adul=$request->get('cant_adul');
    		$taquilla->prec_nino=$request->get('prec_nino');
    		$taquilla->prec_prof=$request->get('prec_prof');
    		$taquilla->prec_adul=$request->get('prec_adul');
            $taquilla->tota=0;
    		
    		//$reserva->apro=1;
    		
    		$taquilla->save();

            $reserva=Reserva::findOrFail($taquilla->id_reserva);
            $reserva->taqu=('SI');

            $reserva->update();


    		$id_exhibicion=$request->get('id_exhibicion');
    		$prec_exhibicion=$request->get('prec_exhibicion');
    		$cant_exhibicion=$request->get('cant_exhibicion');
    		$desc_exhibicion=$request->get('desc_exhibicion');
    		$cont_exhibicion=0;
    		while ($cont_exhibicion<count($id_exhibicion)) {
    			$exhibicion_taquilla = new ExhibicionTaquilla();
    			$exhibicion_taquilla->id_taquilla=$taquilla->id;
    			$exhibicion_taquilla->id_exhibicion=$id_exhibicion[$cont_exhibicion];
    			$exhibicion_taquilla->cant=$cant_exhibicion[$cont_exhibicion];
    			$exhibicion_taquilla->prec=$prec_exhibicion[$cont_exhibicion];
    			$exhibicion_taquilla->desc=$desc_exhibicion[$cont_exhibicion];
    			$exhibicion_taquilla->save();
    			$cont_exhibicion=$cont_exhibicion+1;
    		}
    		$id_paquete=$request->get('id_paquete');
    		$prec_paquete=$request->get('prec_paquete');
    		$desc_paquete=$request->get('desc_paquete');
    		$cant_paquete=$request->get('cant_paquete');
    		$cont_paquete=0;
    		while ($cont_paquete<count($id_paquete)) {
    			$paquete_taquilla = new PaqueteTaquilla();
    			$paquete_taquilla->id_taquilla=$taquilla->id;
    			$paquete_taquilla->id_paquete=$id_paquete[$cont_paquete];
    			$paquete_taquilla->prec=$prec_paquete[$cont_paquete];
    			$paquete_taquilla->cant=$cant_paquete[$cont_paquete];
    			$paquete_taquilla->desc=$desc_paquete[$cont_paquete];
    			$paquete_taquilla->save();
    			$cont_paquete=$cont_paquete+1;
    		}
    		//ESTO NOSE :V
    		//$id_hora=$request->get('id_hora');



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
