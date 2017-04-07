@extends('adminlte::layouts.app')
@section('encabezado')
	Nueva Reserva
@endsection
@section('main-content')

                    <div class="row">
                        <div class="col-md-12">
                                  <!--Contenido-->
                              <div class="panel panel-primary">
								<div class="panel-body">
								<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
									<div class="form-group">
										<label for="nomb_cont">Fecha:</label>
										<p>{{$fecha}}</p>
									</div>
								</div>
								<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
									<div class="form-group">
										<label for="nomb_con">Horario:</label>
										<p>{{$horario->hora_inic}}-{{$horario->hora_fina}}</p>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<table id="detalles_espacio" class="table table-sm table-striped table-bordered table-condesed table-hover">
											<thead style="background-color:#A9D0F5">
												<th>Adultos</th>
												<th>Niños</th>
												<th>Profesores</th>
												<th>Total Personas</th>
											</thead>
											@foreach($personas_horas[0] as $datos)
												<tr>
													<td>{{$datos->adultos}}</td>
													<td>{{$datos->ninos}}</td>
													<td>{{$datos->profesores}}</td>
													<td>{{$datos->total}}</td>
												</tr>
											
											@endforeach
									</table>
								</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<table id="detalles_espacio" class="table table-sm table-striped table-bordered table-condesed table-hover">
											<thead style="background-color:#A9D0F5">
												<th>Exhibicion</th>
												<th>Programados</th>
												<th>Disponibles</th>
											</thead>
											@foreach($exhibiciones_horas[0] as $datos)
												<tr>
													<td>{{$datos->nombre}}</td>
													<td>{{$datos->personas}}</td>
													<td>{{$datos->disponibles}}</td>
												</tr>
											
											@endforeach
										</table>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
													<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
														<thead style="background-color:#A9D0F5">
															<th>Taller</th>
															<th>Programados</th>
															<th>Disponibles</th>
														</thead>
														@foreach($talleres_horas[0] as $datos)
															<tr>
																<td>{{$datos->nombre}}</td>
																<td>{{$datos->personas}}</td>
																<td>{{$datos->disponibles}}</td>
															</tr>
														
														@endforeach
													</table>
												</div>
										<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
													<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
														<thead style="background-color:#A9D0F5">

															<th>Espacio</th>
															<th>Programados</th>
															<th>Disponibles</th>
														</thead>
														@foreach($espacios_horas[0] as $datos)
															<tr>

																<td>{{$datos->nombre}}</td>
																<td>{{$datos->personas}}</td>
																<td>{{$datos->disponibles}}</td>
															</tr>
														
														@endforeach
													</table>
												</div>
								</div>
							</div>
						
@endsection
@section('horas')
			<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Resumen horas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
               
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
			<?php //var_dump($exhibiciones_horas); ?>
			{!!Form::open(array('url'=>'reserva','method'=>'POST','autocomplete'=>'off'))!!}
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label for="inst">Instituto</label>
				<select name="id_instituto" id="id_instituto" class="form-control selectpicker" data-live-search="true">
					@foreach($institutos as $inst)
						<option value="{{$inst->id}}">{{$inst->nomb_inst.'-'.$inst->codi}}</option>
					@endforeach
				</select>
			</div>
			</div>
			<div class="form-group">
					<label>
		      				<input type="checkbox" name="alim" value="1"> Alimento
		    		</label>	
			</div>
			<div class="form-group">
					<label>
		      				<input type="checkbox" name="bus" value="1"> Bus
		    		</label>	
			</div>
			
		
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
			<!--</div>-->
		
			

			<!--<div class="row">-->
			<div class="col-xs-1">
				<label for="prec_prof">Precio Profesores</label>
				<input type="number" step="0.1"  id="pprec_prof" name="prec_prof" class="form-control" placeholder="Profesores...">
			</div>
			<div class="col-xs-1">
				<label for="prec_adul">Precio Adultos</label>
				<input type="number" step="0.1" id="pprec_adul" name="prec_adul" class="form-control" placeholder="Adulto...">
			</div>
			<div class="col-xs-1">
				<label for="prec_nino">Precio Niños</label>
				<input type="number" step="0.1" id="pprec_nino" name="prec_nino" class="form-control" placeholder="Niño...">
			</div>
			<div class="col-xs-1">
				<label for="desc">Descuento precio</label>
				<input type="number" id="pdesc" name="desc" class="form-control" placeholder="Descuento..." onkeyup="Sumar()">
			</div>
			<div class="col-xs-1">
				<label for="totalpersonas">Total Personas</label>
				<output type="number" id="txtPersonas" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPersonas"></h4>-->
			</div>
			<div class="col-xs-1">
				<label for="totalpersonas">Precio Entradas</label>

				<output type="number" id="txtPrecio" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPrecio"></h4>-->
			</div>
			<div class="col-xs-1">
				<label for="totalpersonas">Sub-Total</label>
				<h3  id="txtPT"></h4>
				<!--<output type="number" id="txtPT" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
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
			<div class="row">
			<div class="col-lg-6">
				<label for="nomb_cont">Nombre contacto</label>
				<input type="text" name="nomb_cont" class="form-control" placeholder="Contacto...">
			</div>
			</div>	
			<div class="row">
			<div class="col-lg-6">
				<label for="info_cont">Informacion Contacto</label>
				<textarea class="form-control" rows="3" name="info_cont" placeholder="Contacto..."></textarea>
			</div>
			<div class="col-lg-6">
				<label for="come">Comentario</label>
				<textarea class="form-control" rows="3" name="come" placeholder="Comentario..."></textarea>
			</div>
			</div>
			<br/>
			<br/>
			<br/>

		<div class="panel panel-primary">
			<div class="panel-body">
			
				<div class="col-lg-4 col-xs-4 col-xs-4 col-xs-4">
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
						<label for="pprec_exhibicion">Precio</label>
						<input type="number" name="pprec_exhibicion" id="pprec_exhibicion" class="form-control" placeholder="precio">
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
						<label for="pprec_taller">Precio</label>
						<input type="number" name="pprec_taller" id="pprec_taller" class="form-control" placeholder="precio">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pdesc_taller">Descuento</label>
						<input type="number" name="pdesc_taller" id="pdesc_taller" class="form-control" placeholder="descuento">
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
							<th><h4 id="total_taller">0</h4></th>
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
				<label for="totalpersonas">Talleres</label>

				$<output type="number" id="tExi" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
			</div>
	
		<div class="col-xs-2">
				<label for="totalpersonas">Paquete</label>

				$<output type="number" id="tPaq" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
			</div>
				<div class="col-xs-2">
				<!--<h4 id="txtPT"></h4>-->
			</div>
			
<div class="col-xs-1">
				<!--<label for="totalpersonas">Sub-Total</label>
				<h3  id="txtPT"></h4>
				<!--<output type="number" id="txtPT" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
			</div>			
			<div class="col-xs-2">
				<label for="totalpersonas">Total a Pagar</label>
				<h3  id="tTP"></h4>
				<!--<output type="number" id="tTP" name="desc" class="form-control" placeholder="0">
				<!--<h4 id="txtPT"></h4>-->
			</div>
			

		</div>
<br/>
			<br/>
			<br/>

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
			$("#pprec_taller").val(datos_taller[2]);
		}
		function agregar_taller(){
			datos_taller=document.getElementById('pid_taller').value.split('_');
			taller=$("#pid_taller option:selected").text();
			id_taller=datos_taller[0];
			capa_taller=datos_taller[1];
			prec_taller=$("#pprec_taller").val();
			cant_taller=$("#pcant_taller").val();
			desc_taller=$("#pdesc_taller").val();
			if (cant_taller!="") {
				subtotal_taller[cont_taller]=(cant_taller*prec_taller);
				subtotal_taller[cont_taller]=subtotal_taller[cont_taller]-(subtotal_taller[cont_taller]*(desc_taller/100));
				total_taller=total_taller+subtotal_taller[cont_taller];
				fila_taller='<tr class="selected" id="fila_taller'+cont_taller+'"><td><button type="button" class="btn btn-warning" onclick="eliminar_taller('+cont_taller+');">X</button></td><td><input type="hidden" name="id_taller[]" value="'+id_taller+'">'+taller+'</td><td>'+capa_taller+'</td><td><input type="number" name="cant_taller[]" value="'+cant_taller+'"></td><td><input type="number" name="prec_taller[]" value="'+prec_taller+'"></td><td><input type="number" name="desc_taller[]" value="'+desc_taller+'"></td><td>'+subtotal_taller[cont_taller]+'</td></tr>';
				cont_taller++;
				limpiar_taller();
				$("#total_taller").html("S/. " +total_taller);
				$("#tExi").html(total_taller);
				//evaluar();
				$("#detalles_taller").append(fila_taller);
			}
			else{
				alert('La cantidad de personas debe de ser mayor a 0');
			}
		}
		function eliminar_taller(index){
			total_taller = total_taller - subtotal_taller[index];
			$("#total_taller").html("S/. " +total_taller);
			$("#fila_taller" + index).remove();
			//evaluar();
		}
		function limpiar_taller(){
			$("#pcant_taller").val("");
			$("#pdesc_taller").val("");
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
				//$("#tExi").html(total_exhibicion);
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
				$("#tPaq").html(total_paquete);
				//evaluar();
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
	
		tpersonas=0;
		tadu=0;
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
			$("#txtPrecio").html(tprec);
			$("#txtPT").html("$"+pt);
			$("#tEnt").html(pt);
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
			desc=$("#pdesc").val();
			if (entradas!="") {
				if(exhibicions!=""){
						if(paquetes!=""){
			tPagar=parseFloat(entradas)+parseFloat(paquetes)+parseFloat(exhibicions);
			descu=parseFloat(tPagar)*(parseFloat(desc)/100);
			TP=parseFloat(tPagar)-parseFloat(descu);
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
                                  <!--Fin Contenido-->
                           </div>
                        </div>
                            
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
@endsection
