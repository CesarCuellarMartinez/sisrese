@extends('adminlte::layouts.app')
@section('encabezado')
@if (Auth::user()->tipo == 1)
	Lista de Horarios <a href="horario/create"><button class="btn btn-success">Nuevo</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')
@if (Auth::user()->tipo == 1)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::reserva.horario.search')
		</div>	
	</div>
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						
						<th>Descripcion</th>
						
						
						<th>Opciones</th>
					</thead>
					@foreach($horarios as $hora)
					<tr>
						<td>{{$hora->id}}</td>
						
						<td>{{$hora->desc}}</td>
						
						
						<td><a href="{{URL::action('HorarioController@edit',$hora->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$hora->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
						
					</tr>
					@include('adminlte::reserva.horario.modal')
					@endforeach
				</table>
			</div>
			{{$horarios->render()}}
		</div>
	</div>
	@endif
@endsection