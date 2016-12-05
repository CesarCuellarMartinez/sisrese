<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Horario;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HorarioFormRequest;
use DB;
class HorarioController extends Controller
{
      public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$horarios =DB::table('horarios')->where('desc','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id','desc')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::reserva.horario.index',["horarios"=>$horarios,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("adminlte::reserva.horario.create");
    }
    public function store(HorarioFormRequest $request){
    	$horario = new Horario;
    	
    	$horario->desc=$request->get('desc');
    	
    	
    	$horario->condicion='1';
    	$horario->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('horario')->with('message','Se ha guardado exitosamente');
    }
    public function show($id){
    	return view("adminlte::reserva.horario.show",["horario"=>Horario::findOrFail($id)]);
    }
    public function edit($id){
    	return view("adminlte::reserva.horario.edit",["horario"=>Horario::findOrFail($id)]);
    }
    public function update(HorarioFormRequest $request, $id){
    	$horario=Horario::findOrFail($id);
    	
    	$horario->desc=$request->get('desc');
    	
    	
    	$horario->update();
    	return redirect('horario')->with('message','Se ha actualizado exitosamente');
    }
    public function destroy($id){
    	$horario=Horario::findOrFail($id);
    	$horario->condicion='0';
    	$horario->updated();
    	return redirect('horario')->with('message','Se ha eliminado exitosamente');
    }
}
