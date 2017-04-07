@extends('adminlte::layouts.app')
@section('encabezado')
		Datos Taquilla
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
			{!!Form::open(array('url'=>'taquilla','method'=>'POST','autocomplete'=>'off'))!!}
			<div class="row">
			<div class="col-xs-1">
				<label for="cant_adul">Cantidad Adultos</label>
				<input type="number" id="pcant_adul" name="cant_adul" class="form-control" placeholder="Adultos...">
			</div>
			<div class="col-xs-1">
				<label for="cant_prof">Cantidad Profesores</label>
				<input type="number" id="pcant_pro" name="cant_prof" class="form-control" placeholder="Profesores...">
			</div>
			<div class="col-xs-1">
				<label for="cant_nino">Cantidad Niños</label>
				<input type="number" id="pcant_nino" name="cant_nino" class="form-control" placeholder="Niños...">
			</div>
			<div class="col-xs-1">
				<label for="prec_adul">Precio Adultos</label>
				<input type="number" id="pprec_adul" step="0.1" name="prec_adul" class="form-control" placeholder="Adultos...">
			</div>
			<div class="col-xs-1">
				<label for="prec_prof">Precio Profesores</label>
				<input type="number" id="pprec_prof" step="0.1" name="prec_prof" class="form-control" placeholder="Profesores...">
			</div>
			<div class="col-xs-1">
				<label for="prec_nino">Precio Niños</label>
				<input type="number" id="pprec_nino" step="0.1" name="prec_nino" class="form-control" placeholder="Niños..." onkeyup="Sumar()">
			</div>
			<div class="col-xs-1">
				<label for="cant_adul">Cantidad Personas</label>
				<output type="number" id="txtPersonas" name="cant_adul" class="form-control" placeholder="Adultos...">
			</div>
			<div class="col-xs-1">
				<label for="cant_adul">Descuento Entradas</label>

				<output type="number" id="txtPersonas" name="cant_adul" class="form-control" placeholder="Adultos...">
			</div>
			<div class="col-xs-1">
				<label for="totalpersonas">Buses (Aproximado)</label>
				<h3  id="txtB"></h4>
				<!--<output type="number" id="txtPT" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
			</div>	
				<div class="col-xs-1">
				<label for="totalpersonas">Guias (Aproximado)</label>
				<h3  id="txtG"></h4>
				<!--<output type="number" id="txtPT" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
			</div>	
			</div>
					
			<div class="col-lg-12">
				<label for="come">Comentario</label>
				<textarea class="form-control" rows="3" name="come" placeholder="Comentario..."></textarea>
			</div>
<br/><br/><br/><br/><br/><br/>
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
						<label for="pprec_exhibicion">Precio</label>
						<input type="number" step="0.1" name="pprec_exhibicion" id="pprec_exhibicion" class="form-control" placeholder="precio">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pdesc_exhibicion">Descuento</label>
						<input type="number" name="pdesc_exhibicion" id="pdesc_exhibicion" class="form-control" placeholder="descuento">
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
							<th>Precio</th>
							<th>Descuento</th>
							<th>Sub</th>
						</thead>
						<tfoot>
							<th>Sub Total</th>
							<th></th>
							<th></th>
							<th></th>
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
						<label>Paquetes</label>
						<select name="pid_paquete" class="form-control selectpicker" id="pid_paquete" data-live-search="true">
						@foreach($paquetes as $paqu)
							<option value="{{$paqu->id}}_{{$paqu->numb}}_{{$paqu->prec}}_{{$paqu->desc}}">{{$paqu->nomb}}</option>
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pnumb_paquete">N Personas</label>
						<input type="number" name="pnumb_paquete" id="pnumb_paquete" class="form-control" placeholder="capacidad">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pcant_paquete">Cantidad</label>
						<input type="number" name="pcant_paquete" id="pcant_paquete" class="form-control" placeholder="cantidad">
					</div>

				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pprec_paquete">Precio</label>
						<input type="number" name="pprec_paquete" id="pprec_paquete" class="form-control" placeholder="precio">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pdesc_paquete">Descuento</label>
						<input type="number" name="pdesc_paquete" id="pdesc_paquete" class="form-control" placeholder="descuento">
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="pdescripcion">Descripcion</label>
						<input type="text" name="pdescripcion" id="pdescripcion" class="form-control" placeholder="Descripcion">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add_paquete" class="btn btn-primary">Agregar</button>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles_paquete" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Opciones</th>
							<th>Paquete</th>
							<th>Capacidad</th>
							<th>N paque</th>
							<th>Precio</th>
							<th>Descuento</th>
							<th>Sub</th>
						</thead>
						<tfoot>
							<th>Sub Total</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="total_paquete">0</h4></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
<div class="row">
		
			<div class="col-xs-2">
				<label for="totalpersonas">Entradas</label>

				$<output type="number" id="tEnt" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
			</div>
			<div class="col-xs-2">
				<label for="totalpersonas">Exibicion</label>

				$<output type="number" id="tExi" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
			</div>
			<div class="col-xs-2">
				<label for="totalpersonas">Paquete</label>

				$<output type="number" id="tPaq" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
			</div>
			<div class="col-xs-2">
				<label for="totalpersonas">Total a Pagar</label>
				<h4 id="tTP"></h4>

				<!--<output type="number" id="tTP" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
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
			$("#pprec_exhibicion").val(datos_exhibicion[2]);
		}
		function agregar_exhibicion(){
			datos_exhibicion=document.getElementById('pid_exhibicion').value.split('_');
			exhibicion=$("#pid_exhibicion option:selected").text();
			id_exhibicion=datos_exhibicion[0];
			capa_exhibicion=datos_exhibicion[1];
			prec_exhibicion=$("#pprec_exhibicion").val();
			cant_exhibicion=$("#pcant_exhibicion").val();
			desc_exhibicion=$("#pdesc_exhibicion").val();
			if (cant_exhibicion!="") {
				subtotal_exhibicion[cont_exhibicion]=(cant_exhibicion*prec_exhibicion);
				subtotal_exhibicion[cont_exhibicion]=subtotal_exhibicion[cont_exhibicion]-(subtotal_exhibicion[cont_exhibicion]*(desc_exhibicion/100));
				total_exhibicion=total_exhibicion+subtotal_exhibicion[cont_exhibicion];
				fila_exhibicion='<tr class="selected" id="fila_exhibicion'+cont_exhibicion+'"><td><button type="button" class="btn btn-warning" onclick="eliminar_exhibicion('+cont_exhibicion+');">X</button></td><td><input type="hidden" name="id_exhibicion[]" value="'+id_exhibicion+'">'+exhibicion+'</td><td>'+capa_exhibicion+'</td><td><input type="number" name="cant_exhibicion[]" value="'+cant_exhibicion+'"></td><td><input type="number" name="prec_exhibicion[]" value="'+prec_exhibicion+'"></td><td><input type="number" name="desc_exhibicion[]" value="'+desc_exhibicion+'"></td><td>'+subtotal_exhibicion[cont_exhibicion]+'</td></tr>';
				cont_exhibicion++;
				limpiar_exhibicion();
				$("#total_exhibicion").html("S/. " +total_exhibicion);
				$("#tExi").html(total_exhibicion);
				//evaluar();
				$("#detalles_exhibicion").append(fila_exhibicion);
			}
			else{
				alert('La cantidad de personas debe de ser mayor a 0');
			}
		}
		function eliminar_exhibicion(index){
			total_exhibicion = total_exhibicion - subtotal_exhibicion[index];
			$("#total_exhibicion").html("S/. " +total_exhibicion);
			$("#fila_exhibicion" + index).remove();
			//evaluar();
		}
		function limpiar_exhibicion(){
			$("#pcant_exhibicion").val("");
			$("#pdesc_exhibicion").val("");
		}
		//Paquetes
		$(document).ready(function(){
			$('#bt_add_paquete').click(function(){
				agregar_paquete();
				totalInvertir();
			});
		});
		var cont_paquete=0;
		total_paquete=0;
		subtotal_paquete=[];
		$('#pid_paquete').ready(mostrarValores_paquete);
		$('#pid_paquete').change(mostrarValores_paquete);
		function mostrarValores_paquete(){
			datos_paquete=document.getElementById('pid_paquete').value.split('_');
			$("#pnumb_paquete").val(datos_paquete[1]);
			$("#pprec_paquete").val(datos_paquete[2]);
			$("#pdescripcion").val(datos_paquete[3]);
		}
		function agregar_paquete(){
			datos_paquete=document.getElementById('pid_paquete').value.split('_');
			paquete=$("#pid_paquete option:selected").text();
			id_paquete=datos_paquete[0];
			numb_paquete=datos_paquete[1];
			prec_paquete=$("#pprec_paquete").val();
			cant_paquete=$("#pcant_paquete").val();
			desc_paquete=$("#pdesc_paquete").val();
			if (cant_paquete!="") {
				subtotal_paquete[cont_paquete]=(cant_paquete*prec_paquete);
				subtotal_paquete[cont_paquete]=subtotal_paquete[cont_paquete]-(subtotal_paquete[cont_paquete]*(desc_paquete/100));
				total_paquete=total_paquete+subtotal_paquete[cont_paquete];
				fila_paquete='<tr class="selected" id="fila_paquete'+cont_paquete+'"><td><button type="button" class="btn btn-warning" onclick="eliminar_paquete('+cont_paquete+');">X</button></td><td><input type="hidden" name="id_paquete[]" value="'+id_paquete+'">'+paquete+'</td><td>'+numb_paquete+'</td><td><input type="number" name="cant_paquete[]" value="'+cant_paquete+'"></td><td><input type="number" name="prec_paquete[]" value="'+prec_paquete+'"></td><td><input type="number" name="desc_paquete[]" value="'+desc_paquete+'"></td><td>'+subtotal_paquete[cont_paquete]+'</td></tr>';
				cont_paquete++;
				limpiar_paquete();
				$("#total_paquete").html("S/. " +total_paquete);
				//evaluar();
				$("#tPaq").html(total_paquete);
				$("#detalles_paquete").append(fila_paquete);
			}
			else{
				alert('La cantidad de personas debe de ser mayor a 0');
			}
		}
		function eliminar_paquete(index){
			total_paquete = total_paquete - subtotal_paquete[index];
			$("#total_paquete").html("S/. " +total_paquete);
			$("#fila_paquete" + index).remove();
			//evaluar();
		}
		function limpiar_paquete(){
			$("#pcant_paquete").val("");
			$("#pdesc_paquete").val("");
		}
		function Sumar(){
						// body...
			num1=$("#pcant_adul").val();
			num2=$("#pcant_nino").val();
			num3=$("#pcant_pro").val();
			pAd=$("#pprec_adul").val();
			pNi=$("#pprec_nino").val();
			pPr=$("#pprec_prof").val();
			desc=$("#pdesc").val();
			if(num1!="" && num2!="" && num3!=""){
				
			tpersonas=parseInt(num1)+parseInt(num2)+parseInt(num3);
			tadu=parseInt(num1)*parseFloat(pAd);
			tpro=parseInt(num2)*parseFloat(pPr);
			tnin=parseInt(num3)*parseFloat(pNi);
			tprec=parseFloat(tadu)+parseFloat(tpro)+parseFloat(tnin);
		    top=tpersonas;
				descuento=parseFloat(tprec)*(desc/100)
				pt=parseFloat(tprec)-parseFloat(descuento);
				buses= parseInt(tpersonas)/60;
			    guias= parseInt(tpersonas)/20;
			$("#txtPersonas").html(tpersonas);
			$("#tEnt").html(tprec);

			$("#txtB").html(parseInt(buses));
			$("#txtG").html(parseInt(guias));

			}
			else{
				alert('La cantidad de personas debe de ser mayor a 0');
			}
			
					}
			function totalInvertir(){
			entradas=$("#tEnt").val();
			paquetes=$("#tPaq").val();
			exhibicions=$("#tExi").val();
			if (entradas!="") {
				if(exhibicions!=""){
				
						if(paquetes!=""){
			tPagar=parseFloat(entradas)+parseFloat(paquetes)+parseFloat(exhibicions)
			$("#tTP").html("$"+tPagar);
		}
		else{
			alert('Complete los campos de paquetes');
		}}
		else{
			alert('Complete los campos de exhibiciones');
		}}
		else{
			alert('Complete los campos de entradas');
		}
		}
	</script>
	@endpush
@endsection