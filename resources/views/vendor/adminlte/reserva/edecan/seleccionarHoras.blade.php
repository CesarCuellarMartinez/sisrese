@extends('adminlte::layouts.app')
@section('encabezado')
	Nuevo Taller
@endsection
@section('main-content')
	<div class="row">
	{!!Form::open(array('url'=>'reserva/create','method' => 'get'))!!}
		<div class="panel panel-primary">
			<div class="panel-body">
			
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
						<label>Hora</label>
						<select name="pid_hora" class="form-control selectpicker" id="pid_hora" data-live-search="true">
						@foreach($horas as $hora)
							<option value="{{$hora->id}}">{{$hora->hora_inic}} - {{$hora->hora_fina}}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Opciones</th>
							<th>Hora</th>
						</thead>
						<tfoot>
							<th>T horas</th>
							<th><h4 id="total">0</h4></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
			<div class="form-group">
			<input  name="_token" value="{{csrf_token()}}" type="hidden" />
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
		{{ Form::close() }}
	</div>
	@push('scripts')
	<script>
		$(document).ready(function(){
			$('#bt_add').click(function(){
				agregar();
			});
		});
		var cont=0;
		total=0;
		$("#guardar").hide();
		function agregar(){
			id_hora=$("#pid_hora").val();
			hora=$("#pid_hora option:selected").text();
			if(id_hora !=""){
				var fila ='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_hora[]" value="'+id_hora+'">'+hora+'</td></tr>';
				cont++;
				total++;
				limpiar();
				$("#total").html(total);
				evaluar();
				$("#detalles").append(fila);
			}
			else{
				alert("Error al ingresar una hora, seleccione porfavor");
			}
		}
		function limpiar(){

		}
		function evaluar(){
			if (total>0) {
				$("#guardar").show();
			}
			else{
				$("#guardar").hide();
			}
		}
		function eliminar(index){
			total=total-1;
			$("#total").html(total);
			$("#fila" + index).remove();
			evaluar();
		}
	</script>
	@endpush
@endsection