@extends('adminlte::layouts.app')
@section('encabezado')
	Nuevo Horario
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
			{!!Form::open(array('url'=>'horario','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			
			<div class="form-group">
				<label for="desc">Descripcion</label>
				<input type="text" name="desc" class="form-control" placeholder="Descripcion...">
			</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection