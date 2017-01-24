<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reserva;
use App\HoraReserva;
use App\Instituto;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HoraFormRequest;
use DB;


class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }



    public function registros_mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $usuarios=User::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($usuarios);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($usuarios as $usuario){
        $diasel=intval(date("d",strtotime($usuario->created_at) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }


    


     public function total_reservaciones(){
        $institutos=Instituto::all();

        $cti=count($institutos);
        $reservaciones=Reserva::all();
        $ctr =count($reservaciones);
        $this->prueba($cti,$ctr);
        
        /*Para llenar con 0 los espacios del array, en orden los id de los insitutos */
        for($i=0;$i<=$cti-1;$i++){
         $idIN=$institutos[$i]->id;
         $numeroIns[$idIN]=0;
        }
        /*para ir llenando el array de los institutos segun su aparicion*/
        for($i=0;$i<=$ctr-1;$i++){
         $idIN=$reservaciones[$i]->id_instituto;
         $numeroIns[$idTP]++;
           
        }

        $data=array("totalInstitutos"=>$cti,"institutos"=>$institutos, "numeroIns"=>$numeroIns);
        return json_encode($data);
    }


    public function prueba($cti2,$ctr2)
    {
        echo '<script type="text/javascript">alert("1-' . $cti2 . '")</script>';
        
        echo '<script type="text/javascript">alert("2.' . $ctr2 . '")</script>';
    }


    public function index()
    {
        $anio=date("Y");
        $mes=date("m");
        return view('adminlte::reserva.grafica.index')
               ->with("anio",$anio)
               ->with("mes",$mes);
    }
    public function index2()
    {
        $anio=date("Y");
        $mes=date("m");
        return view('adminlte::reserva.grafica.index2')
               ->with("anio",$anio)
               ->with("mes",$mes);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
