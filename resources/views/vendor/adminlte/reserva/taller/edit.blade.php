@extends('adminlte::layouts.app')
@section('encabezado')
	Editar Registro: {{$taller->nomb}}
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
			<!--El url es de las rutas
			el route es el nombre del enrutamiento + . + metodo a llamar
			-->

			{!!Form::model($taller,['method'=>'PATCH','route'=>['taller.update',$taller->id]])!!}
			{{Form::token()}}
				<div class="form-group">
					<label for="nomb">Nombre Taller</label>
					<input type="text" name="nomb" class="form-control" value="{{$taller->nomb}}" placeholder="Nombre Taller...">
				</div>
				<div class="form-group">
					<label for="desc">Descripcion</label>
					<input type="text" name="desc" class="form-control" value="{{$taller->desc}}" placeholder="Descripcion...">
				</div>
				<div class="form-group">
					<label for="capa">Capacidad</label>
					<input type="number" name="capa" class="form-control" value="{{$taller->capa}}" placeholder="Capacidad...">
				</div>
				<div class="form-group">
					<label for="prec">Precio</label>
					<input type="number" name="prec" step="0.01" class="form-control" value="{{$taller->prec}}" placeholder="Precio...">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection