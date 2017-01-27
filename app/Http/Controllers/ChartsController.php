<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reserva;
use App\User;
use App\Instituto;
use App\Exhibicion;
use App\Espacio;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use DB;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ReservaFormRequest;
use App\Http\Controllers\Session;

use App\EspacioReserva;
use App\ExhibicionReserva;
use App\HoraReserva;
use App\PaqueteReserva;
use App\TallerReserva;
use App\Edecan;
use App\EspacioEdecan;
use App\ExhibicionEdecan;
use App\TallerEdecan;

use PDF;


use Carbon\Carbon;
use Response;
use Auth;
use Illuminate\Support\Collection;

class ChartsController extends Controller
{

	public function __construct(){

    }
     public function area(){
      $lava = new Lavacharts;
      $population = $lava->DataTable();
      /*$data=Charts::select("country as 0","users as 1")->get()->toArray();
      $popularity->addStringColumn('Country')
                  ->addNumberColumn('Users')
                  ->addRows($data);
      $lava->GeoChart('Popularity',$popularity);*/
      $population->addDateColumn('Year')
           ->addNumberColumn('Number of People')
           ->addRow(['2006', 623452])
           ->addRow(['2007', 685034])
           ->addRow(['2008', 716845])
           ->addRow(['2009', 757254])
           ->addRow(['2010', 778034])
           ->addRow(['2011', 792353])
           ->addRow(['2012', 839657])
           ->addRow(['2013', 842367])
           ->addRow(['2014', 873490]);

		$lava->AreaChart('Population', $population, [
		    			'title' => 'Population Growth',
		   			 	'legend' => [
		        		'position' => 'in'
		    								]
		]);
		      return view('adminlte::reserva.chart.index',['lava' => $lava]);
		      
	}

   public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }
	 public function total_reservaciones(Request $request){


         $ar=$request->get('anio_sel');
        if(is_null($ar))
        {
            $anio=date("Y");
            
        }
        else
        {
          
          $anio= $request->get('anio_sel');
        }


        $institutos=Instituto::all();
        $cti=count($institutos);

        $reservaciones=Reserva::all();
        $ctr =count($reservaciones);
        
        /*Para llenar con 0 los espacios del array, en orden los id de los insitutos */
        for($i=0;$i<=$cti-1;$i++){
         $idIN=$institutos[$i]->id;
         $numeroIns[$idIN]=0;
        }
        /*para ir llenando el array de los institutos segun su aparicion*/
        for($i=0;$i<=$ctr-1;$i++){
         $idTP=$reservaciones[$i]->id_instituto;
         $fecha=date("Y",strtotime($reservaciones[$i]->fech));
         if($fecha == $anio)
         {
          $numeroIns[$idTP]++;

         }
         
           
        }

        $lava = new Lavacharts;
        $graficaTotal = $lava->DataTable();
        $graficaTotal->addStringColumn('Instituto')->addNumberColumn('Cantidad');
        for($i = 0; $i <$cti ; $i++ )
        {
        	$idIN = $institutos[$i]->id;
        	$nombre = $institutos[$i]->nomb_inst;
        	$graficaTotal->addRow([$nombre,$numeroIns[$idIN]]);
        }

        $lava->BarChart('reservados',$graficaTotal);


		return view('adminlte::reserva.chart.insti',['lava' => $lava])
                ->with("anio",$anio);

        
    }

    
/*
    public function reservaciones_usuarios(){

        $anio=date("Y");
        $mes=date("m");
        $usuarios=User::all();
        $ctu=count($usuarios);

        $reservaciones=Reserva::all();
        $ctr =count($reservaciones);
        
        /*Para llenar con 0 los espacios del array, en orden los id de los insitutos 
        for($i=0;$i<=$ctu-1;$i++){
         $idUS=$usuarios[$i]->id;
         $numeroUS[$idUS]=0;
        }
        /*para ir llenando el array de los institutos segun su aparicion
        for($i=0;$i<=$ctr-1;$i++){
         $idTP=$reservaciones[$i]->id_usua;
         $numeroUS[$idTP]++;
           
        }

        $lava = new Lavacharts;
        $graficaUS = $lava->DataTable();
        $graficaUS->addStringColumn('Promotor')->addNumberColumn('Cantidad');
        for($i = 0; $i <$ctu ; $i++ )
        {
        	$idu = $usuarios[$i]->id;
        	$nombre = $usuarios[$i]->name;
        	$graficaUS->addRow([$nombre,$numeroUS[$idu]]);
        }

        $lava->PieChart('promo',$graficaUS,[
        	'title' => 'Promotores con mas reservas',
        	'is3D' => true

        	]);


		return view('adminlte::reserva.chart.usuarios',['lava' => $lava])
                ->with("anio",$anio)
               ->with("mes",$mes);

        
    }*/

   

    public function reservaciones_usuarios_mes(Request $request ){

        $ar=$request->get('anio_sel');
        if(is_null($ar))
        {
            $anio=date("Y");
            $mes=date("m");
        }
        else
        {
          $mes= $request->get('mes_sel');
          $anio= $request->get('anio_sel');
        }
            $usuarios=User::all();
            $ctu=count($usuarios);

            /*$reservaciones=Reserva::all();
            $ctr =count($reservaciones);*/

            $primer_dia=1;
            $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
            $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
            $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
            $reservas_total=Reserva::whereBetween('fech', [$fecha_inicial,  $fecha_final])->get();
            $ctrt=count($reservas_total);

              /*Para llenar con 0 los espacios del array, en orden los id de los insitutos 
            for($i=0;$i<=$ctu-1;$i++){
             $idUS=$usuarios[$i]->id;
             $numeroUS[$idUS]=0;
            }



            /*GRAFICA DE LOS TIEMPOS*/

            
            /*para ir llenando el array de los institutos segun su aparicion*/
            /*
            for($i=0;$i<=$ctr-1;$i++){
             $idTP=$reservaciones[$i]->id_usua;
             $numeroUS[$idTP]++;
               
            }

            $lava = new Lavacharts;
            $graficaUS = $lava->DataTable();
            $graficaUS->addStringColumn('Promotor')->addNumberColumn('Cantidad');
            for($i = 0; $i <$ctu ; $i++ )
            {
              $idu = $usuarios[$i]->id;
              $nombre = $usuarios[$i]->name;
              $graficaUS->addRow([$nombre,$numeroUS[$idu]]);
            }

            $lava->PieChart('promo',$graficaUS,[
              'title' => 'Promotores con mas reservas',
              'is3D' => true

              ]);
            /*FIN DE LOS TIEMPOS*/

     /*GRAFICA POR MES*/

      for($i=0;$i<=$ctu-1;$i++){
             $idUST=$usuarios[$i]->id;
             $numeroUST[$idUST]=0;
            }
       
        /*para ir llenando el array de los institutos segun su aparicion*/
        for($i=0;$i<=$ctrt-1;$i++){
         $idT=$reservas_total[$i]->id_usua;
         $numeroUST[$idT]++;
           
        }

        $lavaT = new Lavacharts;
        $graficaUST = $lavaT->DataTable();
        $graficaUST->addStringColumn('Promotor')->addNumberColumn('Cantidad');
        for($i = 0; $i <$ctu ; $i++ )
        {
          $idu = $usuarios[$i]->id;
          $nombre = $usuarios[$i]->name;
          $graficaUST->addRow([$nombre,$numeroUST[$idu]]);
        }

        $lavaT->BarChart('promo_mes',$graficaUST,[
          'title' => 'Promotores con mas reservas del mes'

          ]);


    return view('adminlte::reserva.chart.usuarios',/*['lava' => $lava],*/['lavaT'=>$lavaT])
                ->with("anio",$anio)
               ->with("mes",$mes);

        
    }

     public function cantidad_reservas(Request $request){


         $ar=$request->get('anio_sel');
        if(is_null($ar))
        {
            $anio=date("Y");
            
        }
        else
        {
          
          $anio= $request->get('anio_sel');
        }


        $reservaciones=Reserva::all();
        $ctr =count($reservaciones);

        $nombremes=array(
                  array(1,"ENERO"),
                  array(2,"FEBRERO"),
                  array(3,"MARZO"),
                  array(4,"ABRIL"),
                  array(5,"MAYO"),
                  array(6,"JUNIO"),
                  array(7,"JULIO"),
                  array(8,"AGOSTO"),
                  array(9,"SEPTIEMBRE"),
                  array(10,"OCTUBRE"),
                  array(11,"NOVIEMBRE"),
                  array(12,"DICIEMBRE  ")
                  );
        $ctu=count($nombremes);

        for($i=1;$i<=$ctu;$i++){
             $numeroMes[$i]=0;
            }

       
        /*para ir llenando el array de los institutos segun su aparicion*/
        for($i=0;$i<$ctr;$i++){
         
           $mes=date("m",strtotime($reservaciones[$i]->fech));
           $fecha=date("Y",strtotime($reservaciones[$i]->fech));
           if($fecha == $anio)
           {
            $numeroMes[intval($mes)]++;
           
            

           }
        
        }

        $lava = new Lavacharts;
        $graficaCant = $lava->DataTable();
        $graficaCant->addStringColumn('MES')->addNumberColumn('Cantidad')
                    ->addRow(['ENERO',$numeroMes[1]])
                    ->addRow(['FEBRERO',$numeroMes[2]])
                    ->addRow(['MARZO',$numeroMes[3]])
                    ->addRow(['ABRIL',$numeroMes[4]])
                    ->addRow(['MAYO',$numeroMes[5]])
                    ->addRow(['JUNIO',$numeroMes[6]])
                    ->addRow(['JULIO',$numeroMes[7]])
                    ->addRow(['AGOSTO',$numeroMes[8]])
                    ->addRow(['SEPTIEMBRE',$numeroMes[9]])
                    ->addRow(['OCTUBRE',$numeroMes[10]])
                    ->addRow(['NOVIEMBRE',$numeroMes[11]])
                    ->addRow(['DICIEMBRE',$numeroMes[12]]);
       /* for($i = 0; $i <$ctu ; $i++ )
        {
        
          $graficaCant->addRow([$nombremes[$i][1],$numeroMes[$nombremes[$i][0]]]);
        }*/

        $lava->PieChart('reservaciones',$graficaCant);


    return view('adminlte::reserva.chart.cantiRes',['lava' => $lava])
                ->with("anio",$anio);
                
                


        
    }

    public function pdf($id)
    {
      $reserva=DB::table('reservas as r')
            ->join('institutos as i','r.id_instituto','=','i.id')
            ->join('users as u','r.id_usua','=','u.id')
            ->select('r.id','r.fech','r.esta','i.nomb_inst','u.name')
            ->where('r.id','=',$id)
            ->first();

            $espacios=DB::table('espacio_reserva as er')
            ->join('espacios as e','er.id_espacio','e.id')
            ->select('e.nomb','e.capa','er.cant')
            ->where('er.id_reserva','=',$id)
            ->get();
            $talleres=DB::table('taller_reserva as tr')
            ->join('talleres as t','tr.id_taller','t.id')
            ->select('t.nomb','t.capa','tr.cant','tr.prec','tr.desc')
            ->where('tr.id_reserva','=',$id)
            ->get();
            $exhibiciones=DB::table('exhibicion_reserva as er')
            ->join('exhibiciones as e','er.id_exhibicion','e.id')
            ->select('e.nomb','e.capa','er.cant','er.prec','er.desc')
            ->where('er.id_reserva','=',$id)
            ->get();

            if (Edecan::where('id_reserva', '=', $id)->count() > 0) {
                $edecan = DB::table('edecanes as e')
                ->join('users as u','e.id_usua','=','u.id')
                ->select('e.id','e.fech', 'e.come', 'u.name','e.cant_prof','e.cant_nino','e.cant_adul')
                ->where('e.id_reserva','=',$id)
                ->first();
                $espacios_edecan=DB::table('espacio_edecan as ee')
                ->join('espacios as e','ee.id_espacio','e.id')
                ->select('e.nomb','e.capa','ee.cant')
                ->where('ee.id_edecan','=',$edecan->id)
                ->get();
                $talleres_edecan=DB::table('taller_edecan as te')
                ->join('talleres as t','te.id_taller','t.id')
                ->select('t.nomb','t.capa','te.cant')
                ->where('te.id_edecan','=',$edecan->id)
                ->get();
                $exhibiciones_edecan=DB::table('exhibicion_edecan as ee')
                ->join('exhibiciones as e','ee.id_exhibicion','e.id')
                ->select('e.nomb','e.capa','ee.cant')
                ->where('ee.id_edecan','=',$edecan->id)
                ->get();
                $pdf = PDF::loadView('adminlte::reserva.chart.pdfres',["reserva"=>$reserva,"espacios"=>$espacios,"talleres"=>$talleres,"exhibiciones"=>$exhibiciones,"espacios_edecan"=>$espacios_edecan,"talleres_edecan"=>$talleres_edecan,"exhibiciones_edecan"=>$exhibiciones_edecan,"edecan"=>$edecan]);
                return $pdf->download('archivo.pdf');
                
            }
            else{

                $pdf = PDF::loadView('adminlte::reserva.chart.pdfres',["reserva"=>$reserva,"espacios"=>$espacios,"talleres"=>$talleres,"exhibiciones"=>$exhibiciones]);
                return $pdf->download('archivo.pdf');

            }      
        
    }
}
