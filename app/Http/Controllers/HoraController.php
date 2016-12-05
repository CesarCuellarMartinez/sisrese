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
    		$horas =DB::table('horas')->where('hora_inic','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id','hora_inic')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::reserva.hora.index',["horas"=>$horas,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("adminlte::reserva.hora.create");
    }
    public function store(HoraFormRequest $request){
    	$hora = new Hora;
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
    	return view("adminlte::reserva.hora.edit",["hora"=>Hora::findOrFail($id)]);
    }
    public function update(HoraFormRequest $request, $id){
    	$hora=Hora::findOrFail($id);
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
}
