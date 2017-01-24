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

	
				
				
		

@endsection