@extends('adminlte::layouts.app')
@section('encabezado')
	@if (Auth::user()->tipo == 1)
	Lista de institutos <a href="instituto/create"><button class="btn btn-success">Nuevo</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::reserva.instituto.search')
		</div>	
	</div>
	
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Codigo</th>
						<th>Instituto</th>
						<th>Contacto</th>
						<th>Tel. Contacto</th>
						<th>Tel. Instituto</th>
						<th>Correo Instituto</th>
						<th>Correo Contacto</th>
						@if (Auth::user()->tipo == 1)
						<th>Opciones</th>
						@endif
					</thead>
					@foreach($institutos as $inst)
					<tr>
						<td>{{$inst->id}}</td>
						<td>{{$inst->codi}}</td>
						<td>{{$inst->nomb_inst}}</td>
						<td>{{$inst->nomb_cont}}</td>
						<td>{{$inst->tele_cont}}</td>
						<td>{{$inst->tele_inst}}</td>
						<td>{{$inst->corr_inst}}</td>
						<td>{{$inst->corr_cont}}</td>
						@if (Auth::user()->tipo == 1)
						<td><a href="{{URL::action('InstitutoController@edit',$inst->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$inst->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
						@endif

						
					</tr>
					@include('adminlte::reserva.instituto.modal')
					@push('scripts')
						<script>
						$('#modal-delete-{{$inst->id}}').appendTo("body");
							$("#modal-delete-{{$inst->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					@endforeach
				</table>
			</div>
			{{$institutos->render()}}
		</div>
	</div>
@endsection