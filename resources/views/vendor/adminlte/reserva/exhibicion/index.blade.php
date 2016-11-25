@extends('adminlte::layouts.app')
@section('encabezado')
	Lista de Exhibiciones <a href="exhibicion/create"><button class="btn btn-success">Nuevo</button></a>
@endsection
{{ Session::get('message') }}
@section('main-content')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::reserva.exhibicion.search')
		</div>	
	</div>
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Capacidad</th>
						<th>Precio</th>
						<th>Opciones</th>
					</thead>
					@foreach($exhibiciones as $exhi)
					<tr>
						<td>{{$exhi->id}}</td>
						<td>{{$exhi->nomb}}</td>
						<td>{{$exhi->desc}}</td>
						<td>{{$exhi->capa}}</td>
						<td>{{$exhi->prec}}</td>
						<td><a href="{{URL::action('ExhibicionController@edit',$exhi->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$exhi->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
						
					</tr>
					@include('adminlte::reserva.exhibicion.modal')
					@endforeach
				</table>
			</div>
			<!--
				esta es la vatiable que retorna el metodo index en el controlador
			-->
			{{$exhibiciones->render()}}
		</div>
	</div>
@endsection