<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Instituto;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\InstitutoFormRequest;
use DB;
class InstitutoController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$institutos =DB::table('institutos')->where('codi','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id','desc')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::reserva.instituto.index',["institutos"=>$institutos,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("adminlte::reserva.instituto.create");
    }
    public function store(InstitutoFormRequest $request){
    	$instituto = new Instituto;
    	$instituto->nomb_inst=$request->get('nomb_inst');
    	$instituto->nomb_cont=$request->get('nomb_cont');
    	$instituto->corr_cont=$request->get('corr_cont');
    	$instituto->corr_inst=$request->get('corr_inst');
    	$instituto->tele_inst=$request->get('tele_inst');
    	$instituto->tele_cont=$request->get('tele_cont');
        $instituto->codi=$request->get('codi');
    	$instituto->condicion='1';
    	$instituto->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('instituto')->with('message','Se ha guardado exitosamente');
    }
    public function show($id){
    	return view("adminlte::reserva.instituto.show",["instituto"=>Instituto::findOrFail($id)]);
    }
    public function edit($id){
    	return view("adminlte::reserva.instituto.edit",["instituto"=>Instituto::findOrFail($id)]);
    }
    public function update(InstitutoFormRequest $request, $id){
    	$instituto=Instituto::findOrFail($id);
    	$instituto->nomb_inst=$request->get('nomb_inst');
    	$instituto->nomb_cont=$request->get('nomb_cont');
    	$instituto->corr_cont=$request->get('corr_cont');
    	$instituto->corr_inst=$request->get('corr_inst');
    	$instituto->tele_inst=$request->get('tele_inst');
    	$instituto->tele_cont=$request->get('tele_cont');
        $instituto->codi=$request->get('codi');
    	$instituto->update();
    	return redirect('instituto')->with('message','Se ha actualizado exitosamente');
    }
    public function destroy($id){
    	$instituto=Instituto::findOrFail($id);
    	$instituto->condicion='0';
    	$instituto->update();
    	return redirect('instituto')->with('message','Se ha eliminado exitosamente');
    }
    public function eli($id){
        $instituto=Instituto::findOrFail($id);
        $instituto->condicion='0';
        $instituto->update();
        return redirect('instituto')->with('message','Se ha eliminado exitosamente');
    }
}
