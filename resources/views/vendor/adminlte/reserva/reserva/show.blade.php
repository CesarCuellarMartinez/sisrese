@extends('adminlte::layouts.app')
@section('encabezado')
	Reserva ID: {{$reserva->id}}
	<a href="paquete/create"><button class="btn btn-success">Generar Reporte</button></a>
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
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="tele_cont">Cantidad niños:</label>
			<p>{{$reserva->cant_nino}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="tele_cont">Cantidad adultos:</label>
			<p>{{$reserva->cant_adul}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="tele_cont">Cantidad profesores:</label>
			<p>{{$reserva->cant_prof}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="tele_cont">Precio niños:</label>
			<p>{{$reserva->prec_nino}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="tele_cont">Precio adultos:</label>
			<p>{{$reserva->prec_adul}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
		<div class="form-group">
			<label for="tele_cont">Precio profesores:</label>
			<p>{{$reserva->prec_prof}}</p>
		</div>
	</div>
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
		
		


@endsection
@section('edecan')
		@if(isset($talleres_edecan))
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
                                  <!--Fin Contenido-->
                           </div>
                        </div>
                            
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		@endif
@endsection
