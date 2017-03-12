@extends('adminlte::layouts.app')
@section('encabezado')
		Datos Edecan
@endsection
@section('main-content')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			{!!Form::open(array('url'=>'edecan','method'=>'POST','autocomplete'=>'off'))!!}
			<div class="row">
			<div class="col-xs-2">
				<label for="cant_adul">Cantidad Adultos</label>
				<input type="number" name="cant_adul" class="form-control" placeholder="Adultos...">
			</div>
			<div class="col-xs-2">
				<label for="cant_prof">Cantidad Profesores</label>
				<input type="number" name="cant_prof" class="form-control" placeholder="Profesores...">
			</div>
			<div class="col-xs-2">
				<label for="cant_nino">Cantidad Niños</label>
				<input type="number" name="cant_nino" class="form-control" placeholder="Niños...">
			</div>
			</div>
			<div class="row">
			<div class="col-lg-6">
				<label for="come">Comentario</label>
				<textarea class="form-control" rows="3" name="come" placeholder="Comentario..."></textarea>
			</div>
			</div>
			<br/>
			<br/>
			

		<div class="panel panel-primary">
			<div class="panel-body">
			
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Espacios</label>
						<select name="pid_espacio" class="form-control selectpicker" id="pid_espacio" data-live-search="true">
						@foreach($espacios as $espa)
							<option value="{{$espa->id}}_{{$espa->capa}}">{{$espa->nomb}}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pcant_espacio">Cantidad</label>
						<input type="number" name="pcant_espacio" id="pcant_espacio" class="form-control" placeholder="cantidad">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pcapa_espacio">Capacidad</label>
						<input type="number" name="pcapa_espacio" id="pcapa_espacio" class="form-control" placeholder="capacidad">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add_espacio" class="btn btn-primary">Agregar</button>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Opciones</th>
							<th>Espacio</th>
							<th>Capacidad</th>
							<th>N Personas</th>
						</thead>
						<tfoot>
							<th>T personas</th>
							<th></th>
							<th></th>
							<th><h4 id="total_espacio">0</h4></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-body">
			
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
					<div class="form-group">
						<label>Exhibiciones</label>
						<select name="pid_exhibicion" class="form-control selectpicker" id="pid_exhibicion" data-live-search="true">
						@foreach($exhibiciones as $exhi)
							<option value="{{$exhi->id}}_{{$exhi->capa}}_{{$exhi->prec}}">{{$exhi->nomb}}</option>
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pcapa_exhibicion">Capacidad</label>
						<input type="number" name="pcapa_exhibicion" id="pcapa_exhibicion" class="form-control" placeholder="capacidad">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pcant_exhibicion">Cantidad</label>
						<input type="number" name="pcant_exhibicion" id="pcant_exhibicion" class="form-control" placeholder="cantidad">
					</div>

				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add_exhibicion" class="btn btn-primary">Agregar</button>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles_exhibicion" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Opciones</th>
							<th>Exhibicion</th>
							<th>Capacidad</th>
							<th>N Personas</th>
						</thead>
						<tfoot>
							<th>T Personas</th>
							<th></th>
							<th></th>
							<th><h4 id="total_exhibicion">0</h4></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-body">
			
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
					<div class="form-group">
						<label>Talleres</label>
						<select name="pid_taller" class="form-control selectpicker" id="pid_taller" data-live-search="true">
						@foreach($talleres as $tall)
							<option value="{{$tall->id}}_{{$tall->capa}}_{{$tall->prec}}">{{$tall->nomb}}</option>
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pcapa_taller">Capacidad</label>
						<input type="number" name="pcapa_taller" id="pcapa_taller" disabled class="form-control" placeholder="capacidad">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pcant_taller">Cantidad</label>
						<input type="number" name="pcant_taller" id="pcant_taller" class="form-control" placeholder="cantidad">
					</div>

				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add_taller" class="btn btn-primary">Agregar</button>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles_taller" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Opciones</th>
							<th>Taller</th>
							<th>Capacidad</th>
							<th>N Personas</th>
						</thead>
						<tfoot>
							<th>N Personas</th>
							<th></th>
							<th></th>
							<th><h4 id="total_taller">0</h4></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

			<div class="form-group">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
	@push('scripts')
	<script>
		$(document).ready(function(){
			$('#bt_add_taller').click(function(){
				agregar_taller();
			});
		});
		var cont_taller=0;
		total_taller=0;
		subtotal_taller=[];
		$('#pid_taller').ready(mostrarValores_Taller);
		$('#pid_taller').change(mostrarValores_Taller);
		function mostrarValores_Taller(){
			datos_taller=document.getElementById('pid_taller').value.split('_');
			$("#pcapa_taller").val(datos_taller[1]);
		}
		function agregar_taller(){
			datos_taller=document.getElementById('pid_taller').value.split('_');
			taller=$("#pid_taller option:selected").text();
			id_taller=datos_taller[0];
			capa_taller=datos_taller[1];
			cant_taller=$("#pcant_taller").val();
			if (cant_taller!=0) {
				subtotal_taller[cont_taller]=cant_taller;
				total_taller=total_taller+(subtotal_taller[cont_taller]);
				fila_taller='<tr class="selected" id="fila_taller'+cont_taller+'"><td><button type="button" class="btn btn-warning" onclick="eliminar_taller('+cont_taller+');">X</button></td><td><input type="hidden" name="id_taller[]" value="'+id_taller+'">'+taller+'</td><td>'+capa_taller+'</td><td><input type="number" name="cant_taller[]" value="'+cant_taller+'"></td></tr>';
				cont_taller++;
				limpiar_taller();
				$("#total_taller").html(total_taller);
				//evaluar();
				$("#detalles_taller").append(fila_taller);
			}
			else{
				alert('La cantidad de personas debe de ser mayor a 0');
			}
		}
		function eliminar_taller(index){
			total_taller = total_taller - subtotal_taller[index];
			$("#total_taller").html(total_taller);
			$("#fila_taller" + index).remove();
			//evaluar();
		}
		function limpiar_taller(){
			$("#pcant_taller").val("");
		}
		//Exhibiciones
		$(document).ready(function(){
			$('#bt_add_exhibicion').click(function(){
				agregar_exhibicion();
			});
		});
		var cont_exhibicion=0;
		total_exhibicion=0;
		subtotal_exhibicion=[];
		$('#pid_exhibicion').ready(mostrarValores_Exhibicion);
		$('#pid_exhibicion').change(mostrarValores_Exhibicion);
		function mostrarValores_Exhibicion(){
			datos_exhibicion=document.getElementById('pid_exhibicion').value.split('_');
			$("#pcapa_exhibicion").val(datos_exhibicion[1]);
		}
		function agregar_exhibicion(){
			datos_exhibicion=document.getElementById('pid_exhibicion').value.split('_');
			exhibicion=$("#pid_exhibicion option:selected").text();
			id_exhibicion=datos_exhibicion[0];
			capa_exhibicion=datos_exhibicion[1];
			cant_exhibicion=$("#pcant_exhibicion").val();
			if (cant_exhibicion!="") {
				subtotal_exhibicion[cont_exhibicion]=cant_exhibicion;
				total_exhibicion=total_exhibicion+(subtotal_exhibicion[cont_exhibicion]);
				fila_exhibicion='<tr class="selected" id="fila_exhibicion'+cont_exhibicion+'"><td><button type="button" class="btn btn-warning" onclick="eliminar_exhibicion('+cont_exhibicion+');">X</button></td><td><input type="hidden" name="id_exhibicion[]" value="'+id_exhibicion+'">'+exhibicion+'</td><td>'+capa_exhibicion+'</td><td><input type="number" name="cant_exhibicion[]" value="'+cant_exhibicion+'"></td></tr>';
				cont_exhibicion++;
				limpiar_exhibicion();
				$("#total_exhibicion").html(total_exhibicion);
				//evaluar();
				$("#detalles_exhibicion").append(fila_exhibicion);
			}
			else{
				alert('La cantidad de personas debe de ser mayor a 0');
			}
		}
		function eliminar_exhibicion(index){
			total_exhibicion = total_exhibicion - subtotal_exhibicion[index];
			$("#total_exhibicion").html(total_exhibicion);
			$("#fila_exhibicion" + index).remove();
			//evaluar();
		}
		function limpiar_exhibicion(){
			$("#pcant_exhibicion").val("");
			$("#pdesc_exhibicion").val("");
		}
		//Espacios
		$(document).ready(function(){
			$('#bt_add_espacio').click(function(){
				agregar_espacio();
			});
		});
		var cont_espacio=0;
		total_espacio=0;
		subtotal_espacio=[];
		$('#pid_espacio').ready(mostrarValores_espacio);
		$('#pid_espacio').change(mostrarValores_espacio);
		function mostrarValores_espacio(){
			datos_espacio=document.getElementById('pid_espacio').value.split('_');
			$("#pcapa_espacio").val(datos_espacio[1]);
		}
		function agregar_espacio(){
			datos_espacio=document.getElementById('pid_espacio').value.split('_');
			espacio=$("#pid_espacio option:selected").text();
			id_espacio=datos_espacio[0];
			capa_espacio=datos_espacio[1];
			//prec_espacio=$("#pprec_espacio").val();
			cant_espacio=$("#pcant_espacio").val();
			//desc_espacio=$("#pdesc_espacio").val();
			if (cant_espacio!="") {
				subtotal_espacio[cont_espacio]=cant_espacio;
				total_espacio=total_espacio+(subtotal_espacio[cont_espacio]);
				fila_espacio='<tr class="selected" id="fila_espacio'+cont_espacio+'"><td><button type="button" class="btn btn-warning" onclick="eliminar_espacio('+cont_espacio+');">X</button></td><td><input type="hidden" name="id_espacio[]" value="'+id_espacio+'">'+espacio+'</td><td>'+capa_espacio+'</td><td><input type="number" name="cant_espacio[]" value="'+cant_espacio+'"></td></tr>';
				cont_espacio++;
				limpiar_espacio();
				$("#total_espacio").html(total_espacio);
				//evaluar();
				$("#detalles_espacio").append(fila_espacio);
			}
			else{
				alert('La cantidad de personas debe de ser mayor a 0');
			}
		}
		function eliminar_espacio(index){
			total_espacio = total_espacio - subtotal_espacio[index];
			$("#total_espacio").html(total_espacio);
			$("#fila_espacio" + index).remove();
			//evaluar();
		}
		function limpiar_espacio(){
			$("#pcant_espacio").val("");
		}
	</script>
	@endpush
@endsection