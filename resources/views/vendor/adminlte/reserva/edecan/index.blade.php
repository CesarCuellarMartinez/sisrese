@extends('adminlte::layouts.app')
@section('encabezado')
	@if (Auth::user()->tipo == 1)
	Lista de Reservas <a href="reserva/create"><button class="btn btn-success">Nuevo</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')
@if (Auth::user()->tipo == 1 || Auth::user()->tipo == 4)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::reserva.reserva.search')
		</div>	
	</div>
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th>Instituto</th>
						<th>Usuario</th>
						<th>Opciones</th>

					</thead>
					@foreach($reservas as $rese)
					<tr>
						<td>{{$rese->id}}</td>
						<td>{{$rese->fech}}</td>
						<td>{{$rese->name}}</td>
						<td>{{$rese->nomb_inst}}</td>
						<td>{{$rese->esta}}</td>
						
						
						<td><a href="{{URL::action('ReservaController@show',$rese->id)}}"><button class="btn btn-primary">Detalles</button></a>
						<
						<a href="" data-target="#modal-delete-{{$rese->id}}" data-toggle="modal"><button class="btn btn-danger">Cancelar</button></a></td>
						
					</tr>
					@include('adminlte::reserva.reserva.modal')
					@endforeach
				</table>
			</div>
			{{$reservas->render()}}
		</div>
	</div>
	@endif
@endsection