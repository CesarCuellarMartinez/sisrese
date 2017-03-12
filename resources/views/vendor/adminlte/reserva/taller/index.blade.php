@extends('adminlte::layouts.app')
@section('encabezado')
@if (Auth::user()->tipo == 1)
	Lista de Talleres <a href="taller/create"><button class="btn btn-success">Nuevo</button></a>
	@endif
@endsection
@section('mensajes')
{{ Session::get('message') }}
@endsection
@section('main-content')
@if (Auth::user()->tipo == 1)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::reserva.taller.search')
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
					@foreach($talleres as $tall)
					<tr>
						<td>{{$tall->id}}</td>
						<td>{{$tall->nomb}}</td>
						<td>{{$tall->desc}}</td>
						<td>{{$tall->capa}}</td>
						<td>{{$tall->prec}}</td>
						<td><a href="{{URL::action('TallerController@edit',$tall->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$tall->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
						@push('scripts')
						<script>
						$('#modal-delete-{{$tall->id}}').appendTo("body");
							$("#modal-delete-{{$tall->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					</tr>
					@include('adminlte::reserva.taller.modal')
					
					@endforeach
				</table>
			</div>
			{{$talleres->render()}}
		</div>
	</div>
	@push('scripts')
						
						@endpush
	@endif
					
@endsection