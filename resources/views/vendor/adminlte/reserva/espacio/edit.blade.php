@extends('adminlte::layouts.app')
@section('encabezado')
	Editar Registro: {{$espacio->nomb}}
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

			{!!Form::model($espacio,['method'=>'PATCH','route'=>['espacio.update',$espacio->id]])!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-md-6">
					<label for="nomb">Nombre Espacio</label>
					<input type="text" name="nomb" class="form-control" value="{{$espacio->nomb}}" placeholder="Nombre Espacio...">
				</div>
				<div class="col-xs-2">
					<label for="capa">Capacidad</label>
					<input type="number" name="capa" class="form-control" value="{{$espacio->capa}}" placeholder="Capacidad...">
				</div>
				</div>
				
				<div class="row">
				<div class="col-lg-8">
					<label for="desc">Descripcion</label>
					<input type="text" name="desc" class="form-control" value="{{$espacio->desc}}" placeholder="Descripcion...">
				</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection