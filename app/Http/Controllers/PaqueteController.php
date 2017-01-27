<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paquete;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PaqueteFormRequest;
use DB;
class PaqueteController extends Controller
{
     public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$paquetes =DB::table('paquete')->where('desc','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id','desc')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::reserva.paquete.index',["paquetes"=>$paquetes,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("adminlte::reserva.paquete.create");
    }
    public function store(PaqueteFormRequest $request){
    	$paquete = new Paquete;
    	$paquete->nomb=$request->get('nomb');
    	$paquete->desc=$request->get('desc');
    	$paquete->numb=$request->get('numb');
    	$paquete->prec=$request->get('prec');
    	$paquete->condicion='1';
    	$paquete->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('paquete')->with('message','Se ha guardado exitosamente');
    }
    public function show($id){
    	return view("adminlte::reserva.paquete.show",["paquete"=>Paquete::findOrFail($id)]);
    }
    public function edit($id){
    	return view("adminlte::reserva.paquete.edit",["paquete"=>Paquete::findOrFail($id)]);
    }
    public function update(PaqueteFormRequest $request, $id){
    	$paquete=Paquete::findOrFail($id);
    	$paquete->nomb=$request->get('nomb');
    	$paquete->desc=$request->get('desc');
    	$paquete->numb=$request->get('numb');
    	$paquete->prec=$request->get('prec');
    	$paquete->update();
    	return redirect('paquete')->with('message','Se ha actualizado exitosamente');
    }
    public function destroy($id){
    	$paquete=Paquete::findOrFail($id);
    	$paquete->condicion='0';
    	$paquete->updated();
    	return redirect('paquete')->with('message','Se ha eliminado exitosamente');
    }
     public function eli($id){
        $paquete=Paquete::findOrFail($id);
        $paquete->condicion='0';
        $paquete->update();
        return redirect('paquete')->with('message','Se ha eliminado exitosamente');
    }
}
