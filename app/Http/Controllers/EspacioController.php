<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Espacio;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EspacioFormRequest;
use DB;
class EspacioController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$espacios =DB::table('espacios')->where('nomb','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id','desc')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::reserva.espacio.index',["espacios"=>$espacios,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("adminlte::reserva.espacio.create");
    }
    public function store(EspacioFormRequest $request){
    	$espacio = new Espacio;
    	$espacio->nomb=$request->get('nomb');
    	$espacio->desc=$request->get('desc');
    	$espacio->capa=$request->get('capa');
    	$espacio->condicion='1';
    	$espacio->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('espacio')->with('message','Se ha guardado exitosamente');
    }
    public function show($id){
    	return view("adminlte::reserva.espacio.show",["espacio"=>Espacio::findOrFail($id)]);
    }
    public function edit($id){
    	return view("adminlte::reserva.espacio.edit",["espacio"=>Espacio::findOrFail($id)]);
    }
    public function update(EspacioFormRequest $request, $id){
    	$espacio=Espacio::findOrFail($id);
    	$espacio->nomb=$request->get('nomb');
    	$espacio->desc=$request->get('desc');
    	$espacio->capa=$request->get('capa');
    	$espacio->update();
    	return redirect('espacio')->with('message','Se ha actualizado exitosamente');
    }
    public function destroy($id){
    	$espacio=Espacio::findOrFail($id);
    	$espacio->condicion='0';
    	$espacio->updated();
    	return redirect('espacio')->with('message','Se ha eliminado exitosamente');
    }
    public function eli($id){
        $espacio=Espacio::findOrFail($id);
        $espacio->condicion='0';
        $espacio->update();
        return redirect('espacio')->with('message','Se ha eliminado exitosamente');
    }
}
