@extends('adminlte::layouts.app')
@section('encabezado')
	Reservaciones por mes
@endsection
{{ Session::get('message') }}
@section('main-content')
	
	
	
{!!Form::open(array('url'=>'cantiRes','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

	<div  class="row" >
<div class="col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
                  <label>Año</label>
                  <select class="form-control" id="anio_sel"  name="anio_sel">

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

<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Generar</button>
		</div>
	</div>


{!!Form::close()!!}


	
		<div class="=col-lg-12 col-md-12	 col-sm-12 col-xs-12">
			
			<div id="pop_div2"></div>
			
				
				{!! $lava->render('PieChart', 'reservaciones', 'pop_div2') !!}
				
		</div>
	</div>



@endsection