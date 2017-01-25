@extends('adminlte::layouts.app')
@section('encabezado')
	Lista de Chart 
@endsection
{{ Session::get('message') }}
@section('main-content')
	
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div id="pop_div"></div>
				
				{!! $lava->render('PieChart', 'promo', 'pop_div') !!}
				
		</div>

	</div>

<?php $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>
	<div  class="row" >
<div class="col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
                  <label>Año</label>
                  <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();" name="anio_sel">

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
                  <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" name="mes_sel">
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



	
				
				
		

@endsection