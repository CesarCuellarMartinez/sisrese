<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\EdecanFormRequest;
use App\Http\Controllers\Session;
use App\Edecan;
use App\Reserva;
use App\EspacioEdecan;
use App\ExhibicionEdecan;
use App\TallerEdecan;
use DB;
use Carbon\Carbon;
use Response;
use Auth;
use Illuminate\Support\Collection;
class EdecanController extends Controller
{
    public function __construct(){

    }
     public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$edecanes=DB::table('edecanes as e')
    		->join('users as u','e.id_usua','=','u.id')
    		->join('reservas as s','e.id_reserva','=','s.id')
    		->select('e.id','e.fech','r.fech','r.id','u.name')
    		->where('r.id','LIKE','%'.$query.'%')
    		->groupBy('r.id','e.fech','u.name')
    		->paginate(7);
    		return view('adminlte::reserva.edecan.index',["edecanes"=>$edecanes,"searchText"=>$query]);
    	}
    }
   /* public function seleccionarHoras(){
    	$horas=DB::table('horas')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.reserva.seleccionarHoras",["horas"=>$horas]);
    }*/
    public function create(Request $request){
        $id_reserva=$request->get('id');    	//Session::put('id_reserva', 'id_reserva');
    	$request->session()->put('id_reserva', $id_reserva);
    	$espacios=DB::table('espacios')->where('condicion','=','1')->get();
    	$exhibiciones=DB::table('exhibiciones')->where('condicion','=','1')->get();
    	$talleres=DB::table('talleres')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.edecan.create",["espacios"=>$espacios,"exhibiciones"=>$exhibiciones,"talleres"=>$talleres,"id_reserva"=>$request]);
    }
    public function store(EdecanFormRequest $request){
    	//try{
    		DB::beginTransaction();
    		$edecan=new Edecan;
    		$mytime = Carbon::now('America/Lima');
    		$edecan->id_reserva=$request->session()->get('id_reserva');
    		$edecan->fech=$mytime->toDateTimeString();
    		$edecan->come=$request->get('come');
    		$edecan->id_usua=Auth::id();
    		$edecan->cant_nino=$request->get('cant_nino');
    		$edecan->cant_prof=$request->get('cant_prof');
    		$edecan->cant_adul=$request->get('cant_adul');
    		
    		//$reserva->apro=1;
    		
    		$edecan->save();

            $reserva=Reserva::findOrFail($edecan->id_reserva);
            $reserva->edec=('SI');

            $reserva->update();

    		$id_espacio=$request->get('id_espacio');
    		$cant_espacio=$request->get('cant_espacio');
    		$cont_espacio=0;
    		while ($cont_espacio < count($id_espacio)) {
    			$espacio_edecan= new EspacioEdecan();
    			$espacio_edecan->id_edecan=$edecan->id;
    			$espacio_edecan->id_espacio=$id_espacio[$cont_espacio];
    			$espacio_edecan->cant=$cant_espacio[$cont_espacio];
    			$espacio_edecan->save();
    			$cont_espacio=$cont_espacio+1;
    		}

    		$id_exhibicion=$request->get('id_exhibicion');
    		$cant_exhibicion=$request->get('cant_exhibicion');
    		$cont_exhibicion=0;
    		while ($cont_exhibicion<count($id_exhibicion)) {
    			$exhibicion_edecan = new ExhibicionEdecan();
    			$exhibicion_edecan->id_edecan=$edecan->id;
    			$exhibicion_edecan->id_exhibicion=$id_exhibicion[$cont_exhibicion];
    			$exhibicion_edecan->cant=$cant_exhibicion[$cont_exhibicion];
    			$exhibicion_edecan->save();
    			$cont_exhibicion=$cont_exhibicion+1;
    		}
    		$id_taller=$request->get('id_taller');
    		$cant_taller=$request->get('cant_taller');
    		$cont_taller=0;
    		while ($cont_taller<count($id_taller)) {
    			$taller_edecan = new TallerEdecan();
    			$taller_edecan->id_edecan=$edecan->id;
    			$taller_edecan->id_taller=$id_taller[$cont_taller];
    			$taller_edecan->cant=$cant_taller[$cont_taller];
    			$taller_edecan->save();
    			$cont_taller=$cont_taller+1;
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
