@extends('adminlte::layouts.app') @section('encabezado')     Graficas de la :V
<a href="hora/create"><button class="btn btn-success" on>Nuevo</button></a>
@endsection {{ Session::get('message') }} @section('main-content')

<?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>

<div  class="row" >
<div class="col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
                  <label>Año</label>
                  <select class="form-control" id="anio_sel"  name="anio_sel" data-live-search="true">

                  <?php  echo '<option value="'.$anio.'" >'.$anio.'</option>';   ?>
                    <option value="2016" >2016</option>
                    <option value="2017" >2017</option>
                    <option value="2018">2018</option>
                    <option value="2019" >2019</option>
                    <option value="2020" >2020</option>
                    <option value="2021" >2021</option>
                    <option value="2022" >2022</option>
                    <option value="2023" >2023</option>
                    <option value="2024" >2024</option>
                    <option value="2025" >2025</option>
                  </select>
     </div>             

</div>


<div class="col-lg-6 col-sm-6 col-xs-12"	>
	<div class="form-group">
                  <label>Mes</label>
                  <select class="form-control" id="mes_sel"  name="mes_sel" data-live-search="true">
                  <?php  echo '<option value="'.$mes.'" >'.$nombremes[intval($mes)].'</option>';   ?>
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    <option value="4">ABRIL</option>
                    <option value="5">MAYO</option>
                    <option value="6">JUNIO</option>
                    <option value="7">JULIO</option>
                    <option value="8">AGOSTO</option>
                    <option value="9">SEPTIEMBRE</option>
                    <option value="10">OCTUBRE</option>
                    <option value="11">NOVIEMBRE</option>
                    <option value="12">DICIEMBRE</option>
                  
                  </select>
     </div>             
</div>
</div>

<div  class="row" >
<br/>
	<div class="box box-primary">
		<div class="box-header">
		</div>

		<div class="box-body" id="div_grafica_barras">
		</div>

	    <div class="box-footer">
		</div>
	</div>



		<br/>
	<div class="box box-primary">
		<div class="box-header">
		</div>

		<div class="box-body" id="div_grafica_lineas">
		</div>

	    <div class="box-footer">
		</div>
	</div>


	<br/>
	<div class="box box-primary">
		<div class="box-header">
		</div>

		<div class="box-body" id="div_grafica_pie">
		</div>

	    <div class="box-footer">
		</div>
	</div>


</div>

@push('scripts')
<script>
/*$(document).ready(function(){
			alert('Entro alv');
		});*/
$(document).ready(function(){
			$('#div_grafica_barras').click(function(){
				agregar_taller();
			});
		});
$('#mes_sel').ready(cambiar_fecha_grafica);
$('#anio_sel').ready(cambiar_fecha_grafica);
$('#anio_sel').change(cambiar_fecha_grafica);
$('#anio_sel').change(cambiar_fecha_grafica);
function cambiar_fecha_grafica(){

    var anio_sel=$("#anio_sel").val();
    var mes_sel=$("#mes_sel").val();

    cargar_grafica_pie();
    cargar_grafica_barras(anio_sel,mes_sel);
    cargar_grafica_lineas(anio_sel,mes_sel);
    
}

function cargar_grafica_barras(anio,mes){

    var options={
    	 chart: {
    	 	    renderTo: 'div_grafica_barras',
                type: 'column'
            },
            title: {
                text: 'Numero de Usuarios en el Mes'
            },
            subtitle: {
                text: 'Source: plusis.net'
            },
            xAxis: {
                categories: [],
                 title: {
                    text: 'dias del mes'
                },
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'REGISTROS AL DIA'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'registros',
                data: []

            }]
    }

    $("#div_grafica_barras").html( $("#cargador_empresa").html() );

    var url = "grafica_registros/"+anio+"/"+mes+"";


    $.get(url,function(resul){
    var datos= jQuery.parseJSON(resul);
    var totaldias=datos.totaldias;
    var registrosdia=datos.registrosdia;
    var i=0;
    	for(i=1;i<=totaldias;i++){
    	
    	options.series[0].data.push( registrosdia[i] );
    	options.xAxis.categories.push(i);


    	}


     //options.title.text="aqui e podria cambiar el titulo dinamicamente";
     chart = new Highcharts.Chart(options);

    })


}



function cargar_grafica_lineas(anio,mes){

var options={
     chart: {
            renderTo: 'div_grafica_lineas',
           
        },
          title: {
            text: 'Numero de Registros en el Mes',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Plusis.net',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'REGISTROS POR DIA'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' registros'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'registros',
            data: []
        }]
}

$("#div_grafica_lineas").html( $("#cargador_empresa").html() );
var url = "grafica_registros/"+anio+"/"+mes+"";
$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var i=0;
    for(i=1;i<=totaldias;i++){
    
    options.series[0].data.push( registrosdia[i] );
    options.xAxis.categories.push(i);


    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}




function cargar_grafica_pie(){

		var options={
		     // Build the chart
		     
		            chart: {
		                renderTo: 'div_grafica_pie',
		                plotBackgroundColor: null,
		                plotBorderWidth: null,
		                plotShadow: false,
		                type: 'pie'
		            },
		            title: {
		                text: 'Grafica Reservas'
		            },
		            tooltip: {
		                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		            },
		            plotOptions: {
		                pie: {
		                    allowPointSelect: true,
		                    cursor: 'pointer',
		                    dataLabels: {
		                        enabled: false
		                    },
		                    showInLegend: true
		                }
		            },
		            series: [{
		                name: 'Brands',
		                colorByPoint: true,
		                data: []
		            }]
		     
		}

		$("#div_grafica_pie").html( $("#cargador_empresa").html() );

		var url = "grafica_reservas";


		$.get(url,function(resul){
		var datos= jQuery.parseJSON(resul);
		var isnti=datos.institutos;
		var totains=datos.totalInstitutos;
		var numeroInsti=datos.numeroIns;

		    for(i=0;i<=totains-1;i++){  
		    var idIN=parseInt(isnti[i].id);
		    var objeto= {name: isnti[i].titulo, y:numeroInsti[idIN] };     
		    options.series[0].data.push( objeto );  
		    }
		 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
		 chart = new Highcharts.Chart(options);

		})


}


</script>

@endpush
@endsection 