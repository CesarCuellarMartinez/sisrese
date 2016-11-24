@extends('adminlte::layouts.app')
@section('encabezado')
	Nuevo Taller
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
			{!!Form::open(array('url'=>'taller','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nomb">Nombre Taller</label>
				<input type="text" name="nomb" class="form-control" placeholder="Nombre Taller...">
			</div>
			<div class="form-group">
				<label for="desc">Descripcion</label>
				<input type="text" name="desc" class="form-control" placeholder="Descripcion...">
			</div>
			<div class="form-group">
				<label for="capa">Capacidad</label>
				<input type="number" name="capa" class="form-control" placeholder="Capacidad...">
			</div>
			<div class="form-group">
				<label for="prec">Precio</label>
				<input type="number" step="0.01" name="prec" class="form-control" placeholder="Precio...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection