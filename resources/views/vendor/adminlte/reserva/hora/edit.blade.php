@extends('adminlte::layouts.app')
@section('encabezado')
	Editar Registro: {{$hora->hora_inic}} y {{$hora->hora_fina}}
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

			{!!Form::model($hora,['method'=>'PATCH','route'=>['hora.update',$hora->id]])!!}
			{{Form::token()}}
				
				<div class="form-group">
					<label for="hora_inic">Hora inicial</label>
					<input type="time" name="hora_inic" class="form-control" value="{{$hora->hora_inic}}" placeholder="Hora inicial...">
				</div>
				
				<div class="form-group">
					<label for="hora_fina">Hora Final</label>
					<input type="time" name="hora_fina"  class="form-control" value="{{$hora->hora_fina}}" placeholder="Hora Final...">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection