@extends('adminlte::layouts.app')
@section('encabezado')
	
@endsection
{{ Session::get('message') }}
@section('main-content')
@if (Auth::user()->tipo == 1)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::reserva.asignar.search')
		</div>	
	</div>
	
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Estado</th>
						<th>Tipo de Usuario</th>
						<th>Opciones</th>
						
					</thead>
					@foreach($usuarios as $us)
					<tr>
						<td>{{$us->id}}</td>
						<td>{{$us->name}}</td>
						<td>{{$us->email}}</td>
						@if($us->valido == 1)
						<td>Activo</td>
						@else
						<td>No activo</td>
						@endif
						<td>{{$us->nom_tipo}}</td>
						
						<td><a href="{{URL::action('AsignarController@edit',$us->id)}}"><button class="btn btn-info">Editar</button></a>
						@if($us->valido == null || $us->valido == 0)
							<a href="" data-target="#modal-confirm-{{$us->id}}" data-toggle="modal"><button class="btn btn-danger">Activar</button></a>
		
								

						@endif
						@if($us->valido == 1 )
							<a href="{{URL::action('AsignarController@des', ['id'=>$us->id])}}"><button class="btn btn-primary">Desactivar</button></a>
							

						@endif

						<a href="" data-target="#modal-delete-{{$us->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
						

						
					</tr>
					@include('adminlte::reserva.asignar.modal')
					@include('adminlte::reserva.asignar.modal2')
					@push('scripts')
						<script>
						$('#modal-delete-{{$us->id}}').appendTo("body");
							$("#modal-delete-{{$us->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						$('#modal-confirm-{{$us->id}}').appendTo("body");
							$("#modal-confirm-{{$us->id}}").css("z-index", "1500");
									//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					@endforeach
				</table>
			</div>
			{{$usuarios->render()}}
		</div>
	</div>
	@endif
@endsection