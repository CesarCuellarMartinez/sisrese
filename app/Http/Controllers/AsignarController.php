<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User; 
use App\TipoUsuario;
use DB;

class AsignarController extends Controller
{
    
	public function __construct(){

    }

    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$usuarios =DB::table('users as u')    		
    		->join('tipo_usuario as t', 'u.tipo','=','t.id')
    		->select('u.id','u.name','u.email','u.valido','t.nom_tipo')
    		->where('name','LIKE','%'.$query.'%')->orderBy('id','email')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::reserva.asignar.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    	}
    }

    public function show($id){
    	return view("adminlte::reserva.asignar.show",["usuario"=>User::findOrFail($id)]);
    }
     public function edit($id){

        $usuario = User::findOrFail($id);
        $tipos = DB::table('tipo_usuario')->where('condicion','=','1')->get();
    	return view("adminlte::reserva.asignar.edit",["usuario"=>$usuario,"tipos"=>$tipos]);
    }

      public function update(Request $request, $id){
    	$usuario=User::findOrFail($id);
        
        $usuario->tipo=$request->get('id_tipo');
    	$usuario->update();
    	return redirect('asignar')->with('message','Se ha actualizado exitosamente');
    }
    public function destroy($id){
    	$usuario=User::findOrFail($id);
    	
    	$usuario->delete();
    	return redirect('asignar')->with('message','Se ha eliminado exitosamente');
    }

     public function con($id){
        $usuario=User::findOrFail($id);
        $usuario->valido= 1;
        $usuario->update();
        return redirect('asignar')->with('message','Se confirmado con exito el usuario');
    }
    public function des($id){
        $usuario=User::findOrFail($id);
        $usuario->valido= 0;
        $usuario->update();
        return redirect('asignar')->with('message','Se confirmado con exito el usuario');
    }



}
