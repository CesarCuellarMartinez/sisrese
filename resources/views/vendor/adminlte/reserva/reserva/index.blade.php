@extends('adminlte::layouts.app')
@section('encabezado')
	@if (Auth::user()->tipo == 1 || Auth::user()->tipo == 2 )
	Lista de Reservas <a href="reserva/seleccionarHoras"><button class="btn btn-success">Nuevo</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')
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
						<th>Usuario</th>
						<th>Instituto</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					@foreach($reservas as $rese)
					<tr>
						<td>{{$rese->id}}</td>
						<td>{{$rese->fech}}</td>
						<td>{{$rese->name}}</td>
						<td>{{$rese->nomb_inst}}</td>
						<td>{{$rese->esta}}</td>
						
						
						<td><a href="{{URL::action('ReservaController@show',['id'=>$rese->id])}}"><button class="btn btn-primary">Detalles</button></a>
						
					@if (Auth::user()->tipo == 1 || Auth::user()->tipo == 2 )   	
						@if($rese->id_usua==$id_usua AND $rese->esta=='RESERVADO')
							<a href="" data-target="#modal-confirm-{{$rese->id}}" data-toggle="modal"><button class="btn btn-danger">Confirmar</button></a>
		
								

						@endif
						@if($rese->edec=="NO" AND $rese->esta=='CONFIRMADO')
							<a href="{{URL::action('EdecanController@create', ['id'=>$rese->id])}}"><button class="btn btn-primary">Edecan</button></a>
							

						@endif
						@if($rese->taqu=="NO" AND $rese->esta=='CONFIRMADO')
							<a href="{{URL::action('TaquillaController@create', ['id'=>$rese->id])}}"><button class="btn btn-primary">Taquilla</button></a>
							

						@endif
						@if($rese->id_usua==$id_usua AND $rese->esta!='CANCELADO')
							<a href="" data-target="#modal-delete-{{$rese->id}}" data-toggle="modal"><button class="btn btn-danger">Cancelar</button></a></td>
							@push('scripts')
								<script>
								$('#modal-delete-{{$rese->id}}').appendTo("body");
									$("#modal-delete-{{$rese->id}}").css("z-index", "1500");
									//$('#modal-delete-1').appendTo("body");
								$('#modal-confirm-{{$rese->id}}').appendTo("body");
									$("#modal-confirm-{{$rese->id}}").css("z-index", "1500");
									//$('#modal-delete-1').appendTo("body");
								</script>
							@endpush
						@endif
					@endif
						
					</tr>
					@include('adminlte::reserva.reserva.modal')
					@include('adminlte::reserva.reserva.modal2')
					@endforeach
				</table>
			</div>
			{{$reservas->render()}}
		</div>
	</div>
@endsection