<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hora;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HoraFormRequest;
use DB;
class HoraController extends Controller
{
     public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$horas =DB::table('horas as a')
            ->join('horarios as b','a.id_horario','=','b.id')
            ->select('a.id','a.hora_inic','a.hora_fina','b.desc as horario')
            ->where('hora_inic','LIKE','%'.$query.'%')
            ->orwhere('hora_fina','LIKE','%'.$query.'%')
            ->orwhere('desc','LIKE','%'.$query.'%')
            ->where('a.condicion','=','1')->orderBy('a.id','hora_inic')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::reserva.hora.index',["horas"=>$horas,"searchText"=>$query]);
    	}
    }
    public function create(){
        $horarios=DB::table('horarios')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.hora.create",["horarios"=>$horarios]);
    }
    public function store(HoraFormRequest $request){
    	$hora = new Hora;
        $hora->id_horario=$request->get('id_horario');
    	$hora->hora_inic=$request->get('hora_inic');
        $hora->hora_fina=$request->get('hora_fina');
    	$hora->condicion='1';
    	$hora->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('hora')->with('message','Se ha guardado exitosamente');
    }
    public function show($id){
    	return view("adminlte::reserva.hora.show",["hora"=>Hora::findOrFail($id)]);
    }
    public function edit($id){

        $hora = Hora::findOrFail($id);
        $horarios = DB::table('horarios')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.hora.edit",["hora"=>$hora,"horarios"=>$horarios]);
    }
    public function update(HoraFormRequest $request, $id){
    	$hora=Hora::findOrFail($id);
        $hora->id_horario=$request->get('id_horario');
    	$hora->hora_inic=$request->get('hora_inic');
        $hora->hora_fina=$request->get('hora_fina');
    	$hora->update();
    	return redirect('hora')->with('message','Se ha actualizado exitosamente');
    }
    public function destroy($id){
    	$hora=Hora::findOrFail($id);
    	$hora->condicion='0';
    	$hora->updated();
    	return redirect('hora')->with('message','Se ha eliminado exitosamente');
    }
    public function eli($id){
        $hora=Hora::findOrFail($id);
        $hora->condicion='0';
        $hora->update();
        return redirect('hora')->with('message','Se ha eliminado exitosamente');
    }
}
