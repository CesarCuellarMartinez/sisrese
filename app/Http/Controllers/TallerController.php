<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Taller;
use App\User;
use App\TipoUsuario;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TallerFormRequest;
use DB;
class TallerController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
        $req =$request->get('fantasma');
        if (is_null($req)) {
            $a="entro";
        }
        else{
            $a="no entro";
        }
        /*$id1 = $request->session()->get('id');
        $tipo = User::where('id', $id1)->get();

        if($tipo != null) 
        {
             return redirect('instituto')->with('message', 'hola'.$id1.' h');
        }*/
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$talleres =DB::table('talleres')->where('nomb','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id','desc')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::reserva.taller.index',["talleres"=>$talleres,"searchText"=>$query,"req"=>$req,"a"=>$a]);
    	}
    }
    public function create(){
    	return view("adminlte::reserva.taller.create");
    }
    public function store(TallerFormRequest $request){
    	$taller = new Taller;
    	$taller->nomb=$request->get('nomb');
    	$taller->desc=$request->get('desc');
    	$taller->capa=$request->get('capa');
    	$taller->prec=$request->get('prec');
    	$taller->condicion='1';
    	$taller->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('taller')->with('message','Se ha guardado exitosamente');
    }
    public function show($id){
    	  $taller=Taller::findOrFail($id);
        $taller->condicion='0';
        $taller->update();
        return redirect('taller')->with('message','Se ha eliminado exitosamente');
    }
    public function edit($id){
    	return view("adminlte::reserva.taller.edit",["taller"=>Taller::findOrFail($id)]);
    }
    public function update(TallerFormRequest $request, $id){
    	$taller=Taller::findOrFail($id);
    	$taller->nomb=$request->get('nomb');
    	$taller->desc=$request->get('desc');
    	$taller->capa=$request->get('capa');
    	$taller->prec=$request->get('prec');
    	$taller->update();
    	return redirect('taller')->with('message','Se ha actualizado exitosamente');
    }
    public function destroy($id){
    	$taller=Taller::findOrFail($id);
        $taller->condicion='0';
        $taller->update();
        return redirect('taller')->with('message','Se ha eliminado exitosamente');
    }
    public function eli($id){
        $taller=Taller::findOrFail($id);
        $taller->condicion='0';
        $taller->update();
        return redirect('taller')->with('message','Se ha eliminado exitosamente');
    }
}
