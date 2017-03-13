@extends('adminlte::layouts.app')
@section('encabezado')
	Editar Registro: {{$usuario->name}}
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

			{!!Form::model($usuario,['method'=>'PATCH','route'=>['asignar.update',$usuario->id]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-md-6">
						<label for="nomb">Nombre </label>
						<input type="text" readonly="readonly" name="nomb" class="form-control" value="{{$usuario->name}}" placeholder="Nombre Espacio...">
					</div>
				<div class="col-md-6">
						<label for="nomb">Email </label>
						<input type="text" readonly="readonly" name="nomb" class="form-control" value="{{$usuario->email}}" placeholder="Nombre Espacio...">
					</div>

					<div class="col-md-3">
				
					<label>Tipo de usuario</label>
					<select name="id_tipo" class="form-control">
					@foreach ($tipos as $ti)
						@if($ti->id==$usuario->tipo)
						<option value="{{$ti->id}}"selected>{{$ti->nom_tipo}} </option>
						@else
						<option value="{{$ti->id}}">{{$ti->nom_tipo}} </option>
						@endif
					@endforeach
				</select>
			
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