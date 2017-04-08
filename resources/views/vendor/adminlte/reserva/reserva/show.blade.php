@extends('adminlte::layouts.app')
@section('encabezado')
	Reserva ID: {{$reserva->id}}
	<a href="{{URL::action('ChartsController@pdf',['id'=>$reserva->id])}}"><button class="btn btn-primary">Generar Reporte</button></a>
@endsection
{{ Session::get('message') }}
@section('main-content')


<di class="row">

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="nomb_inst">Estado:</label>
			<p>{{$reserva->esta}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="nomb_cont">Usuario:</label>
			<p>{{$reserva->name}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="nomb_inst">Nombre Instituto:</label>
			<p>{{$reserva->nomb_inst}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="nomb_cont">Nombre Contacto:</label>
			<p>{{$reserva->nomb_cont}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="corr_cont">Corre Contacto:</label>
			<p>{{$reserva->corr_cont}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="tele_cont">Telefono Contacto:</label>
			<p>{{$reserva->tele_cont}}</p>
		</div>
	</div>
	<div class="row">
	<div class="col-xs-2">
	
			<label for="tele_cont">Cantidad niños:</label>
			<p>{{$reserva->cant_nino}}</p>
			<input type="hidden" id="pcant_nino" name="_token" value="{{$reserva->cant_nino}}"></input>
		
	</div>
	<div class="col-xs-2">
		
			<label for="tele_cont">Cantidad adultos:</label>
			<p>{{$reserva->cant_adul}}</p>
			<input type="hidden" id="pcant_adul" name="_token" value="{{$reserva->cant_adul}}"></input>
	
	</div>
	<div class="col-xs-2">
		
			<label for="tele_cont">Cantidad profesores:</label>
			<p>{{$reserva->cant_prof}}</p>
			<input type="hidden" id="pcant_pro" name="_token" value="{{$reserva->cant_prof}}"></input>
	
		</div>

	<div class="col-xs-2">
		
			<label for="tele_cont">Precio niños:</label>
			<p>{{$reserva->prec_nino}}</p>

	</div>
	<div class="col-xs-2">
		
			<label for="tele_cont">Precio adultos:</label>
			<p>{{$reserva->prec_adul}}</p>
		
	</div>
	<div class="col-xs-2">
	
			<label for="tele_cont">Precio profesores:</label>
			<p>{{$reserva->prec_prof}}</p>
	
	</div>
		<div class="col-xs-2">
	
			<label for="tele_cont">Descuento:</label>
			<p>{{$reserva->desc}}</p>
		
	</div>
	
	<div class="col-xs-2">

			<label for="tele_cont">Cantidad personas:</label>
			<p id="txtPersonas">{{$cantPer}}</p>
		
	</div>
	<div class="col-xs-2">

			<label for="tele_cont">Cantidad Buses:</label>
			<p id="txtPersonas">{{$bus}}</p>
		
	</div>
	<div class="col-xs-2">

			<label for="tele_cont">Cantidad Guias:</label>
			<p id="txtPersonas">{{$guia}}</p>
		
	</div>
	<div class="col-xs-2">
		
			<label for="tele_cont">Sub-Total/entrada:</label>
			<p id="txtPT">{{$entra}}</p>
		
	</div>
	<div class="col-xs-2">
		
			<label for="tele_cont">Total Entrada</label>
			<p id="txtPT">{{$entrada}}</p>
		
	</div>
	</div>
	<br/>

	<br/>
	<br/>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
		<div class="form-group">
			<label for="corr_cont">Fecha Reservada:</label>
			<p>{{$reserva->fech_rese}}</p>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
		<div class="form-group">
			<label for="tele_cont">Fecha de reservacion:</label>
			<p>{{$reserva->fech}}</p>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
		<div class="form-group">
			<label for="tele_cont">Comentario:</label>
			<p>{{$reserva->come}}</p>
		</div>
	</div>
</di>
		<div class="panel panel-primary">
			<div class="panel-body">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Horas</label>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Hora Inicial</th>
							<th>Hora Final</th>
						</thead>
						@foreach($horas as $hora)
							<tr>
								<td>{{$hora->hora_inic}}</td>
								<td>{{$hora->hora_fina}}</td>
							</tr>
						@endforeach

					</table>
				</div>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-body">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Espacios</label>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Nombre</th>
							<th>Capacidad</th>
							<th>Cantidad</th>
						</thead>
						@foreach($espacios as $espa)
							<tr>
								<td>{{$espa->nomb}}</td>
								<td>{{$espa->capa}}</td>
								<td>{{$espa->cant}}</td>
							</tr>
						@endforeach

					</table>
				</div>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-body">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Talleres</label>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Nombre</th>
							<th>Capacidad</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Descuento</th>
						</thead>
						@foreach($talleres as $tall)
							<tr>
								<td>{{$tall->nomb}}</td>
								<td>{{$tall->capa}}</td>
								<td>{{$tall->cant}}</td>
								<td>{{$tall->prec}}</td>
								<td>{{$tall->desc}}</td>
							</tr>
						@endforeach

					</table>
				</div>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-body">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Exhibiciones</label>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Nombre</th>
							<th>Capacidad</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Descuento</th>
						</thead>
						@foreach($exhibiciones as $exhi)
							<tr>
								<td>{{$exhi->nomb}}</td>
								<td>{{$exhi->capa}}</td>
								<td>{{$exhi->cant}}</td>
								<td>{{$exhi->prec}}</td>
								<td>{{$exhi->desc}}</td>
							</tr>
						@endforeach

					</table>
				</div>
			</div>
		</div>
		
		<div class="panel panel-primary">
			<div class="panel-body">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Paquetes</label>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Nombre</th>
							<th>Capacidad</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Descuento</th>
						</thead>
						@foreach($paquetes as $paqu)
							<tr>
								<td>{{$paqu->nomb}}</td>
								<td>{{$paqu->numb}}</td>
								<td>{{$paqu->cant}}</td>
								<td>{{$paqu->prec}}</td>
								<td>{{$paqu->desc}}</td>
							</tr>
						@endforeach

					</table>
				</div>
			</div>
		</div>


@endsection
@section('taquilla')
		@if(isset($taquilla))
			<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Taquilla</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                                  <!--Contenido-->
                                  <div class="row">
                                  	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group">
											<label for="nomb_inst">Nombre Usuario:</label>
											<p>{{$taquilla->name}}</p>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group">
											<label for="nomb_inst">Fecha Datos:</label>
											<p>{{$taquilla->fech}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group">
											<label for="nomb_inst">Cantidad niños:</label>
											<p>{{$taquilla->cant_nino}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group">
											<label for="nomb_inst">Cantidad Adultos:</label>
											<p>{{$taquilla->cant_adul}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group">
											<label for="nomb_inst">Cantidad Profesores:</label>
											<p>{{$taquilla->cant_prof}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group">
											<label for="nomb_inst">Precion niños:</label>
											<p>{{$taquilla->prec_nino}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group">
											<label for="nomb_inst">Precion Adultos:</label>
											<p>{{$taquilla->prec_adul}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group">
											<label for="nomb_inst">Precion Profesores:</label>
											<p>{{$taquilla->prec_prof}}</p>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group">
											<label for="nomb_inst">Comentarios:</label>
											<p>{{$taquilla->come}}</p>
										</div>
									</div>
                                  </div>
                             <div class="panel panel-primary">
								<div class="panel-body">
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label>Exhibiciones</label>
										</div>
									</div>
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
											<thead style="background-color:#A9D0F5">
												<th>Nombre</th>
												<th>Capacidad</th>
												<th>Cantidad</th>
												<th>Precio</th>
												<th>Descuento</th>
											</thead>
											@foreach($exhibiciones_taquilla as $exhi)
												<tr>
													<td>{{$exhi->nomb}}</td>
													<td>{{$exhi->capa}}</td>
													<td>{{$exhi->cant}}</td>
													<td>{{$exhi->prec}}</td>
													<td>{{$exhi->desc}}</td>
												</tr>
											@endforeach

										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-primary">
							<div class="panel-body">
							<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label>Paquetes</label>
									</div>
								</div>
								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
									<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
										<thead style="background-color:#A9D0F5">
											<th>Nombre</th>
											<th>Capacidad</th>
											<th>Cantidad</th>
											<th>Precio</th>
											<th>Descuento</th>
										</thead>
										@foreach($paquetes_taquilla as $paqu)
											<tr>
												<td>{{$paqu->nomb}}</td>
												<td>{{$paqu->numb}}</td>
												<td>{{$paqu->cant}}</td>
												<td>{{$paqu->prec}}</td>
												<td>{{$paqu->desc}}</td>
											</tr>
										@endforeach

									</table>
								</div>
							</div>
						</div>


                                  <!--Fin Contenido-->
                           </div>
                        </div>
                            
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		@endif
@endsection

@section('edecan')
		@if(isset($edecan))
			<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edecan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                                  <!--Contenido-->
                                  <div class="row">
                                  	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group">
											<label for="nomb_inst">Nombre Usuario:</label>
											<p>{{$edecan->name}}</p>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group">
											<label for="nomb_inst">Fecha Datos:</label>
											<p>{{$edecan->fech}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group">
											<label for="nomb_inst">Cantidad niños:</label>
											<p>{{$edecan->cant_nino}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group">
											<label for="nomb_inst">Cantidad Adultos:</label>
											<p>{{$edecan->cant_adul}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
										<div class="form-group">
											<label for="nomb_inst">Cantidad Profesores:</label>
											<p>{{$edecan->cant_prof}}</p>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
										<div class="form-group">
											<label for="nomb_inst">Comentarios:</label>
											<p>{{$edecan->come}}</p>
										</div>
									</div>
                                  </div>
                              <div class="panel panel-primary">
								<div class="panel-body">
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label>Espacios</label>
										</div>
									</div>
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
											<thead style="background-color:#A9D0F5">
												<th>Nombre</th>
												<th>Capacidad</th>
												<th>Cantidad</th>
											</thead>
											@foreach($espacios_edecan as $espa)
												<tr>
													<td>{{$espa->nomb}}</td>
													<td>{{$espa->capa}}</td>
													<td>{{$espa->cant}}</td>
												</tr>
											@endforeach

										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-primary">
								<div class="panel-body">
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label>Talleres</label>
										</div>
									</div>
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
											<thead style="background-color:#A9D0F5">
												<th>Nombre</th>
												<th>Capacidad</th>
												<th>Cantidad</th>
											</thead>
											@foreach($talleres_edecan as $tall)
												<tr>
													<td>{{$tall->nomb}}</td>
													<td>{{$tall->capa}}</td>
													<td>{{$tall->cant}}</td>
												</tr>
											@endforeach

										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-primary">
								<div class="panel-body">
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label>Exhbiciones</label>
										</div>
									</div>
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<table id="detalles_espacio" class="table table-striped table-bordered table-condesed table-hover">
											<thead style="background-color:#A9D0F5">
												<th>Nombre</th>
												<th>Capacidad</th>
												<th>Cantidad</th>
											</thead>
											@foreach($exhibiciones_edecan as $exhi)
												<tr>
													<td>{{$exhi->nomb}}</td>
													<td>{{$exhi->capa}}</td>
													<td>{{$exhi->cant}}</td>
												</tr>
											@endforeach

										</table>
									</div>
								</div>
							</div>

	@push('scripts')
	<script>
$(function() {
    alert('Adios');
});
$(window).load(function(){
			hola();
		});
		tpersonas=0;
		tadu=0;
		function hola(){
			alert('probando');
		}
		function Sumar(){
						// body...
			num1=$("#pcant_adul").html();
			num2=$("#pcant_nino").html();
			num3=$("#pcant_pro").html();
			pAd=$("#pprec_adul").html();
			pNi=$("#pprec_nino").html();
			pPr=$("#pprec_prof").html();
			desc=$("#pdesc").html();
			if(num1!="" && num2!="" && num3!=""){
				
			tpersonas=parseInt(num1)+parseInt(num2)+parseInt(num3);
			tadu=parseInt(num1)*parseFloat(pAd);
			tpro=parseInt(num2)*parseFloat(pPr);
			tnin=parseInt(num3)*parseFloat(pNi);
			tprec=parseFloat(tadu)+parseFloat(tpro)+parseFloat(tnin);
		    top=tpersonas;
				descuento=parseFloat(tprec)*(desc/100)
				pt=parseFloat(tprec)-parseFloat(descuento);
			$("#txtPersonas").html(tpersonas);
	
			$("#txtPT").html("$"+pt);	

			}
			else{
				alert('La cantidad de personas debe de ser mayor a 0');
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
		@endif
@endsection

