@extends('adminlte::layouts.app')
@section('encabezado')
	Editar Registro: {{$instituto->nomb_inst}}
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

			{!!Form::model($instituto,['method'=>'PATCH','route'=>['instituto.update',$instituto->id]])!!}
			{{Form::token()}}
			<div class="">
				<div class="col-xs-3">
					<label for="codi">Codigo instituto</label>
					<input type="text" name="codi" class="form-control" value="{{$instituto->codi}}" placeholder="Codigo Instituto...">
				</div>
				<div class="co-md-8">
					<label for="nomb_inst">Nombre instituto</label>
					<input type="text" name="nomb_inst" class="form-control" value="{{$instituto->nomb_inst}}" placeholder="Nombre Instituto...">
				</div>
			</div>	
			<div>
				<div class="col-lg-11">
					<label for="nomb_cont">Nobre Contacto</label>
					<input type="text" name="nomb_cont" class="form-control" value="{{$instituto->nomb_cont}}" placeholder="Nombre Contacto...">
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<label for="tele_inst">Telefono instituto</label>
					<input type="text" name="tele_inst" class="form-control" value="{{$instituto->tele_inst}}" placeholder="Telefono Instituto...">
				</div>
				<div class="col-md--5">
					<label for="tele_cont">Telefono Contacto</label>
					<input type="text" name="tele_cont" class="form-control" value="{{$instituto->tele_cont}}" placeholder="Telefono Contacto...">
				</div>
				</div>
				<div class="form-group">
					<label for="corr_inst">Correo instituto</label>
					<input type="text" name="corr_inst" class="form-control" value="{{$instituto->corr_inst}}" placeholder="Correo Instituto...">
				</div>
				<div class="form-group">
					<label for="corr_cont">Correo Contacto</label>
					<input type="text" name="corr_cont" class="form-control" value="{{$instituto->corr_cont}}" placeholder="Correo Contacto...">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection