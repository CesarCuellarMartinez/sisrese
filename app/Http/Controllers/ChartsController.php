<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reserva;
use App\User;
use App\Instituto;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use DB;
use Khill\Lavacharts\Lavacharts;

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

	 public function total_reservaciones(){

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
         $numeroIns[$idTP]++;
           
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


		return view('adminlte::reserva.chart.insti',['lava' => $lava]);

        
    }

    

    public function reservaciones_usuarios(){

        $anio=date("Y");
        $mes=date("m");
        $usuarios=User::all();
        $ctu=count($usuarios);

        $reservaciones=Reserva::all();
        $ctr =count($reservaciones);
        
        /*Para llenar con 0 los espacios del array, en orden los id de los insitutos */
        for($i=0;$i<=$ctu-1;$i++){
         $idUS=$usuarios[$i]->id;
         $numeroUS[$idUS]=0;
        }
        /*para ir llenando el array de los institutos segun su aparicion*/
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

        
    }


}
