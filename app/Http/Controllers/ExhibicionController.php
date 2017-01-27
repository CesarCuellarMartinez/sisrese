<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exhibicion;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ExhibicionFormRequest;
use DB;

class ExhibicionController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$exhibiciones =DB::table('exhibiciones')->where('nomb','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id','desc')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::reserva.exhibicion.index',["exhibiciones"=>$exhibiciones,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("adminlte::reserva.exhibicion.create");
    }
    public function store(ExhibicionFormRequest $request){
    	$exhibicion = new Exhibicion;
    	$exhibicion->nomb=$request->get('nomb');
    	$exhibicion->desc=$request->get('desc');
    	$exhibicion->capa=$request->get('capa');
    	$exhibicion->prec=$request->get('prec');
    	$exhibicion->condicion='1';
    	$exhibicion->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('exhibicion')->with('message','Se ha guardado exitosamente');
    }
    public function show($id){
    	return view("adminlte::reserva.exhibicion.show",["exhibicion"=>Exhibicion::findOrFail($id)]);
    }
    public function edit($id){
    	return view("adminlte::reserva.exhibicion.edit",["exhibicion"=>Exhibicion::findOrFail($id)]);
    }
    public function update(ExhibicionFormRequest $request, $id){
    	$exhibicion=Exhibicion::findOrFail($id);
    	$exhibicion->nomb=$request->get('nomb');
    	$exhibicion->desc=$request->get('desc');
    	$exhibicion->capa=$request->get('capa');
    	$exhibicion->prec=$request->get('prec');
    	$exhibicion->update();
    	return redirect('exhibicion')->with('message','Se ha actualizado exitosamente');
    }
    public function destroy($id){
    	$exhibicion=Exhibicion::findOrFail($id);
    	$exhibicion->condicion='0';
    	$exhibicion->updated();
    	return redirect('exhibicion')->with('message','Se ha eliminado exitosamente');
    }
     public function eli($id){
        $exhibicion=Exhibicion::findOrFail($id);
        $exhibicion->condicion='0';
        $exhibicion->update();
        return redirect('exhibicion')->with('message','Se ha eliminado exitosamente');
    }
}
