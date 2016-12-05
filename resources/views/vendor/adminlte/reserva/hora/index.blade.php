@extends('adminlte::layouts.app')
@section('encabezado')
	Lista de Horas <a href="hora/create"><button class="btn btn-success">Nuevo</button></a>
@endsection
{{ Session::get('message') }}
@section('main-content')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::reserva.hora.search')
		</div>	
	</div>
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						
						<th>Hora Inicial</th>
						
						<th>Hora final</th>
						<th>Opciones</th>
					</thead>
					@foreach($horas as $hor)
					<tr>
						<td>{{$hor->id}}</td>
						
						<td>{{$hor->hora_inic}}</td>
						
						<td>{{$hor->hora_fina}}</td>
						<td><a href="{{URL::action('HoraController@edit',$hor->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$hor->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
						
					</tr>
					@include('adminlte::reserva.hora.modal')
					@endforeach
				</table>
			</div>
			{{$horas->render()}}
		</div>
	</div>
@endsection