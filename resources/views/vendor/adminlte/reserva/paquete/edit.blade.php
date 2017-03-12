@extends('adminlte::layouts.app')
@section('encabezado')
	Editar Registro: {{$paquete->desc}}
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

			{!!Form::model($paquete,['method'=>'PATCH','route'=>['paquete.update',$paquete->id]])!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-md-6">
				<label for="nomb">Nombre</label>
				<input type="text" name="nomb" class="form-control" value="{{$paquete->nomb}}" placeholder="Nombre...">
			</div>
			<div class="col-xs-3">
				<label for="prec">Precio</label>
				<input type="number" name="prec" step="0.01" class="form-control" value="{{$paquete->prec}}" placeholder="Precio...">
			</div>
			
			<div class="col-xs-3">
				<label for="numb">N° de personas</label>
				<input type="number" name="numb" class="form-control" value="{{$paquete->numb}}" placeholder="Numero...">
			</div>
			</div>
			<div class="row">
			<div class="col-lg-12">
				<label for="desc">Descripcion</label>
				<input type="text" name="desc" class="form-control" value="{{$paquete->desc}}" placeholder="Descripcion...">
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