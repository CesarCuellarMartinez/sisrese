@extends('adminlte::layouts.app')
@section('encabezado')
	Nueva Hora
@endsection
@section('main-content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<!--El url es de las rutas-->
			{!!Form::open(array('url'=>'hora','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			
			<div class="form-group">
				<label for="hora_inic">Hora inicio</label>
				<input type="time" name="hora_inic" class="form-control" placeholder="Hora inicial...">
			</div>
			<div class="form-group">
				<label for="hora_fina">Hora Final</label>
				<input type="time" name="hora_fina" class="form-control" placeholder="Hora final...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection