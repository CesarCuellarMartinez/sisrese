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
use App\Taquilla;
use App\EspacioEdecan;
use App\ExhibicionEdecan;
use App\TallerEdecan;
use App\Hora;
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
    		->select('r.id','r.fech','r.esta','i.nomb_inst','u.name','edec','taqu','u.id as id_usua')
    		->where('r.id','LIKE','%'.$query.'%')
    		->groupBy('r.id','r.fech','r.esta','i.nomb_inst','u.name','edec','taqu','u.id')
    		->paginate(7);
             $id_usua=Auth::id();
    		return view('adminlte::reserva.reserva.index',["reservas"=>$reservas,"searchText"=>$query,"id_usua"=>$id_usua]);
    	}
    }
    public function seleccionarHoras(){
    	$horas=DB::table('horas')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.reserva.seleccionarHoras",["horas"=>$horas]);
    }
    public function create(Request $request){

    	$id_hora=$request->get('id_hora');
        $horario=Hora::findOrFail($id_hora[0]);
        $fecha=$request->get('fech_rese');
    	///Session::put('id_hora', 'id_hora');
        $cont_hora=0;
            while ($cont_hora<count($id_hora)) {
                   $exhibiciones_horas[$cont_hora] = DB::select( DB::raw("SELECT rese.fech_rese,exhibiciones.nomb as 'nombre',SUM(exre.cant) as 'personas', horas.hora_inic,horas.hora_fina, (exhibiciones.capa-SUM(exre.cant)) as 'disponibles' FROM reservas as rese inner join hora_reserva ON rese.id = hora_reserva.id_reserva inner join horas on horas.id = hora_reserva.id_hora inner join exhibicion_reserva as exre on exre.id_reserva = rese.id RIGHT JOIN exhibiciones on exhibiciones.id = exre.id_exhibicion WHERE horas.id = :a AND rese.fech_rese = :b  group by rese.fech_rese, exhibiciones.nomb, horas.hora_inic, horas.hora_fina,exhibiciones.capa"), array('a' => $id_hora[$cont_hora],'b'=>$fecha  ));
                   $espacios_horas[$cont_hora] = DB::select( DB::raw("SELECT rese.fech_rese,espacios.nomb as 'nombre' ,SUM(esre.cant) as 'presonas', horas.hora_inic,horas.hora_fina, (espacios.capa-SUM(esre.cant)) as 'disponibles' from reservas as rese inner join hora_reserva on rese.id = hora_reserva.id_reserva inner join horas on horas.id = hora_reserva.id_hora inner join espacio_reserva as esre on esre.id_reserva = rese.id right join espacios on espacios.id = esre.id_espacio where horas.id =:a and rese.fech_rese=:b group by rese.fech_rese, espacios.nomb,horas.hora_inic, horas.hora_fina,espacios.capa"), array('a' => $id_hora[$cont_hora],'b'=>$fecha  ));
                   $talleres_horas[$cont_hora] = DB::select( DB::raw("SELECT rese.fech_rese, talleres.nomb as 'nombre' ,SUM(tare.cant) as 'personas', horas.hora_inic,horas.hora_fina, (talleres.capa-SUM(tare.cant)) as 'disponibles' from reservas as rese inner join hora_reserva on rese.id = hora_reserva.id_reserva inner join horas on horas.id = hora_reserva.id_hora inner join taller_reserva as tare on tare.id_reserva = rese.id right join talleres on talleres.id = tare.id_taller where horas.id =:a and rese.fech_rese=:b group by rese.fech_rese, talleres.nomb, horas.hora_inic, horas.hora_fina,talleres.capa"), array('a' => $id_hora[$cont_hora],'b'=>$fecha  ));
                   
                   $personas_horas[$cont_hora] = DB::select( DB::raw("SELECT rese.fech_rese ,SUM(rese.cant_adul) as 'adultos',SUM(rese.cant_nino) as 'ninos',SUM(rese.cant_prof) as 'profesores',(SUM(rese.cant_adul)+SUM(rese.cant_nino)+SUM(rese.cant_prof)) as 'total', horas.hora_inic,horas.hora_fina FROM reservas as rese inner join hora_reserva ON rese.id = hora_reserva.id_reserva inner join horas on horas.id = hora_reserva.id_hora WHERE horas.id = :a AND rese.fech_rese = :b  group by rese.fech_rese, horas.hora_inic, horas.hora_fina"), array('a' => $id_hora[$cont_hora],'b'=>$fecha  ));

                $cont_hora=$cont_hora+1;
            }
     
    		$request->session()->put('id_hora',$id_hora);
            $request->session()->put('fecha',$fecha);
    	$institutos=DB::table('institutos')->get();
    	$espacios=DB::table('espacios')->where('condicion','=','1')->get();
    	$exhibiciones=DB::table('exhibiciones')->where('condicion','=','1')->get();
    	$talleres=DB::table('talleres')->where('condicion','=','1')->get();
    	$paquetes=DB::table('paquete')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.reserva.create",["institutos"=>$institutos,"espacios"=>$espacios,"exhibiciones"=>$exhibiciones,"talleres"=>$talleres,"paquetes"=>$paquetes,"horas"=>$id_hora,"espacios_horas"=>$espacios_horas,"talleres_horas"=>$talleres_horas,"exhibiciones_horas"=>$exhibiciones_horas,"personas_horas"=>$personas_horas,"fecha"=>$fecha,"horario"=>$horario]);
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
    		$reserva->fech_rese=$request->session()->get('fecha');
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
            $eedec=false;
            $etaqu=false;
            $reserva=DB::table('reservas as r')
            ->join('institutos as i','r.id_instituto','=','i.id')
            ->join('users as u','r.id_usua','=','u.id')
            ->select('r.id','r.fech','r.esta','i.nomb_inst','i.nomb_cont','i.corr_cont','i.tele_cont','u.name','r.alim','r.apro','r.cant_adul','r.cant_nino','r.cant_prof','r.come','r.prec_adul','r.prec_nino','r.prec_prof','r.desc','r.fech_rese','r.info_cont','r.nomb_cont')
            ->where('r.id','=',$id)
            ->first();
            $cantNi=$reserva->cant_nino;
            $cantAd=$reserva->cant_adul;
            $cantPr=$reserva->cant_prof;
            $cantPer=$cantNi+$cantAd+$cantPr;
            $buse=$cantPer/60;
            $bus=intval($buse);
            $gui=$cantPer/20;
            if ($gui<0.5) {
                $guia=1;
            }else{
                $guia=intval($gui);
            }
            $preNi=$reserva->prec_nino;
            $preAd=$reserva->prec_adul;
            $prePr=$reserva->prec_prof;
            $descu=$reserva->desc;
            $entra=($preNi*$cantNi)+($preAd*$cantAd)+($prePr*$cantPr);
            $dc=$entra*($descu/100);
            $entrada=$entra-$dc;

            $espacios=DB::table('espacio_reserva as er')            ->join('espacios as e','er.id_espacio','e.id')
            ->select('e.nomb','e.capa','er.cant')
            ->where('er.id_reserva','=',$id)
            ->get();
            $talleres=DB::table('taller_reserva as tr')
            ->join('talleres as t','tr.id_taller','t.id')
            ->select('t.nomb','t.capa','tr.cant','tr.prec','tr.desc')
            ->where('tr.id_reserva','=',$id)
            ->get();
            $exhibiciones=DB::table('exhibicion_reserva as er')
            ->join('exhibiciones as e','er.id_exhibicion','e.id')
            ->select('e.nomb','e.capa','er.cant','er.prec','er.desc')
            ->where('er.id_reserva','=',$id)
            ->get();
            $paquetes=DB::table('paquete_reserva as pr')
            ->join('paquete as p','pr.id_paquete','p.id')
            ->select('p.nomb','p.numb','pr.cant','pr.prec','pr.desc')
            ->where('pr.id_reserva','=',$id)
            ->get();
            $horas=DB::table('hora_reserva as hr')
            ->join('horas as h','hr.id_hora','h.id')
            ->select('h.hora_inic','h.hora_fina')
            ->where('hr.id_reserva','=',$id)
            ->get();
            
            if (Edecan::where('id_reserva', '=', $id)->count() > 0) {
                $edecan = DB::table('edecanes as e')
                ->join('users as u','e.id_usua','=','u.id')
                ->select('e.id','e.fech', 'e.come', 'u.name','e.cant_prof','e.cant_nino','e.cant_adul')
                ->where('e.id_reserva','=',$id)
                ->first();
                $espacios_edecan=DB::table('espacio_edecan as ee')
                ->join('espacios as e','ee.id_espacio','e.id')
                ->select('e.nomb','e.capa','ee.cant')
                ->where('ee.id_edecan','=',$edecan->id)
                ->get();
                $talleres_edecan=DB::table('taller_edecan as te')
                ->join('talleres as t','te.id_taller','t.id')
                ->select('t.nomb','t.capa','te.cant')
                ->where('te.id_edecan','=',$edecan->id)
                ->get();
                $exhibiciones_edecan=DB::table('exhibicion_edecan as ee')
                ->join('exhibiciones as e','ee.id_exhibicion','e.id')
                ->select('e.nomb','e.capa','ee.cant')
                ->where('ee.id_edecan','=',$edecan->id)
                ->get();
                $eedec=true;
               
            }
            if (Taquilla::where('id_reserva', '=', $id)->count() > 0) {
                $taquilla = DB::table('taquilla as t')
                ->join('users as u','t.id_usua','=','u.id')
                ->select('t.id','t.fech', 't.come', 'u.name','t.cant_prof','t.cant_nino','t.cant_adul','t.prec_prof','t.prec_nino','t.prec_adul')
                ->where('t.id_reserva','=',$id)
                ->first();
                 $exhibiciones_taquilla=DB::table('exhibicion_taquilla as et')
                ->join('exhibiciones as e','et.id_exhibicion','e.id')
                ->select('e.nomb','e.capa','et.cant','et.prec','et.desc')
                ->where('et.id_taquilla','=',$taquilla->id)
                ->get();
                $paquetes_taquilla=DB::table('paquete_taquilla as pt')
                ->join('paquete as p','pt.id_paquete','p.id')
                ->select('p.nomb','p.numb','pt.cant','pt.prec','pt.desc')
                ->where('pt.id_taquilla','=',$taquilla->id)
                ->get();
                $etaqu=true;
            }
            if ($eedec && $etaqu) {
               return view("adminlte::reserva.reserva.show",["reserva"=>$reserva,"espacios"=>$espacios,"talleres"=>$talleres,"paquetes"=>$paquetes,"exhibiciones"=>$exhibiciones,"espacios_edecan"=>$espacios_edecan,"talleres_edecan"=>$talleres_edecan,"exhibiciones_edecan"=>$exhibiciones_edecan,"edecan"=>$edecan,"horas"=>$horas,"exhibiciones_taquilla"=>$exhibiciones_taquilla,"paquetes_taquilla"=>$paquetes_taquilla,"taquilla"=>$taquilla,"cantPer"=>$cantPer,"bus"=>$bus,"guia"=>$guia,"entra"=>$entra,"entrada"=>$entrada]);
            }
            elseif ($eedec) {
                 return view("adminlte::reserva.reserva.show",["reserva"=>$reserva,"espacios"=>$espacios,"talleres"=>$talleres,"paquetes"=>$paquetes,"exhibiciones"=>$exhibiciones,"espacios_edecan"=>$espacios_edecan,"talleres_edecan"=>$talleres_edecan,"exhibiciones_edecan"=>$exhibiciones_edecan,"edecan"=>$edecan,"horas"=>$horas,"cantPer"=>$cantPer,"bus"=>$bus,"guia"=>$guia,"entra"=>$entra,"entrada"=>$entrada]);
            }
            elseif ($etaqu) {
                return view("adminlte::reserva.reserva.show",["reserva"=>$reserva,"espacios"=>$espacios,"talleres"=>$talleres,"paquetes"=>$paquetes,"exhibiciones"=>$exhibiciones,"exhibiciones_taquilla"=>$exhibiciones_taquilla,"paquetes_taquilla"=>$paquetes_taquilla,"taquilla"=>$taquilla,"horas"=>$horas,"cantPer"=>$cantPer,"bus"=>$bus,"guia"=>$guia,"entra"=>$entra,"entrada"=>$entrada]);
            }
            else{
                return view("adminlte::reserva.reserva.show",["reserva"=>$reserva,"espacios"=>$espacios,"talleres"=>$talleres,"paquetes"=>$paquetes,"exhibiciones"=>$exhibiciones,"horas"=>$horas,"cantPer"=>$cantPer,"bus"=>$bus,"guia"=>$guial,"entra"=>$entra,"entrada"=>$entrada]);
            }      

    }
    public function destroy($id){
    	$reserva=Reserva::findOrFail($id);
        $reserva->esta='CANCELADO';
        $reserva->update();
        return redirect('reserva')->with('message','Se cancelado con exito la reserva');
    }
    public function eli($id){
        $reserva=Reserva::findOrFail($id);
        $reserva->esta='CANCELADO';
        $reserva->update();
        return redirect('reserva')->with('message','Se cancelado con exito la reserva');
    }
    public function con($id){
        $reserva=Reserva::findOrFail($id);
        $reserva->esta='CONFIRMADO';
        $reserva->update();
        return redirect('reserva')->with('message','Se confirmado con exito la reserva');
    }
}
