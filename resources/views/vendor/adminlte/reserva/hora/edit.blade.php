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
		</div>
	</div>
			<!--El url es de las rutas
			el route es el nombre del enrutamiento + . + metodo a llamar
			-->

			{!!Form::model($hora,['method'=>'PATCH','route'=>['hora.update',$hora->id],])!!}
			{{Form::token()}}
				
	<div class="row">
		<div class="col-md-5">
			
				<label for="hora_inic">Hora inicio</label>
				<input type="time" required value="{{$hora->hora_inic}}" name="hora_inic" class="form-control" placeholder="Hora inicial...">
			
		</div>
		
		
		<div class="col-md-5">
			
				<label for="hora_fina">Hora Final</label>
				<input type="time" required value="{{$hora->hora_fina}}" name="hora_fina" class="form-control" placeholder="Hora final...">
			
		</div>

		
		<div class="col-md-5">
			
				<label>Horario</label>
				<select name="id_horario" class="form-control">
					@foreach ($horarios as $horari)
						@if($horari->id==$hora->id_horario)
						<option value="{{$horari->id}}"selected>{{$horari->desc}} </option>
						@else
						<option value="{{$horari->id}}">{{$horari->desc}} </option>
						@endif
					@endforeach
				</select>
		
		</div>
	
		<div class="col-md-5">
			
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			
		</div>
	</div>
			{!!Form::close()!!}
		
@endsection