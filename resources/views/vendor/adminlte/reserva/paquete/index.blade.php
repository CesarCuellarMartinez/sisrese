@extends('adminlte::layouts.app')
@section('encabezado')
@if (Auth::user()->tipo == 1)
	Lista de Paquetes <a href="paquete/create"><button class="btn btn-success">Nuevo</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')
@if (Auth::user()->tipo == 1)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::reserva.paquete.search')
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
						<th>N Personas</th>
						<th>Precio</th>
						<th>Opciones</th>
					</thead>
					@foreach($paquetes as $paqu)
					<tr>
						<td>{{$paqu->id}}</td>
						<td>{{$paqu->nomb}}</td>
						<td>{{$paqu->desc}}</td>
						<td>{{$paqu->numb}}</td>
						<td>{{$paqu->prec}}</td>
						<td><a href="{{URL::action('PaqueteController@edit',$paqu->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$paqu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
						@push('scripts')
						<script>
						$('#modal-delete-{{$paqu->id}}').appendTo("body");
							$("#modal-delete-{{$paqu->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					</tr>
					@include('adminlte::reserva.paquete.modal')
					@endforeach
				</table>
			</div>
			{{$paquetes->render()}}
		</div>
	</div>
	@endif
@endsection