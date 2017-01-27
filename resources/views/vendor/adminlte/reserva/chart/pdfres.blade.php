<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reserva</title>
	<link rel="stylesheet" type="text/css" href="css/reporte.css">
</head>
<body>
	<h1>Resumen de la reserva</h1>
	Reserva ID: {{$reserva->id}}
	{{ Session::get('message') }}

	
		<div >
			
					<div class="form-group">
						<label>Espacios</label>
					</div>
				
				
					<table id="detalles_espacio" >
						<thead style="background-color:#A9D0F5">
							<tr>
								<th>Nombre</th>
								<th>Capacidad</th>
								<th>Cantidad</th>
							</tr>
						</thead>	
						<tbody>
						@foreach($espacios as $espa)
							<tr>
								<td>{{$espa->nomb}}</td>
								<td>{{$espa->capa}}</td>
								<td>{{$espa->cant}}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				
			
		</div>
		<div >
			
					<div class="form-group">
						<label>Talleres</label>
					</div>
				
				
					<table id="detalles_espacio" >
						<thead style="background-color:#A9D0F5">
							<tr>
							<th>Nombre</th>
							<th>Capacidad</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Descuento</th>
							</tr>
						</thead>
						<tbody>
						@foreach($talleres as $tall)
							<tr>
								<td>{{$tall->nomb}}</td>
								<td>{{$tall->capa}}</td>
								<td>{{$tall->cant}}</td>
								<td>{{$tall->prec}}</td>
								<td>{{$tall->desc}}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				
		</div>
		<div >
			
					<div class="form-group">
						<label>Exhibiciones</label>
					</div>
				
				
					<table id="detalles_espacio" >
						<thead style="background-color:#A9D0F5">
							<tr>
							<th>Nombre</th>
							<th>Capacidad</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Descuento</th>
							</tr>
						</thead>
						<tbody>
						@foreach($exhibiciones as $exhi)
							<tr>
								<td>{{$exhi->nomb}}</td>
								<td>{{$exhi->capa}}</td>
								<td>{{$exhi->cant}}</td>
								<td>{{$exhi->prec}}</td>
								<td>{{$exhi->desc}}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				
		</div>
		
		

		@if(isset($talleres_edecan))
			<div >
         
                  <h3 class="box-title">Edecan</h3>
                  
                </div>
                <!-- /.box-header -->
                
                                  <!--Contenido-->
                              <div >
								
										<div class="form-group">
											<label>Espacios</label>
										</div>
									
									
										<table id="detalles_espacio" >
											<thead style="background-color:#A9D0F5">
												<tr>
												<th>Nombre</th>
												<th>Capacidad</th>
												<th>Cantidad</th>
												</tr>
											</thead>
											<tbody>
											@foreach($espacios_edecan as $espa)
												<tr>
													<td>{{$espa->nomb}}</td>
													<td>{{$espa->capa}}</td>
													<td>{{$espa->cant}}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								
							<div >
								
								
										<div class="form-group">
											<label>Talleres</label>
										</div>
									
									
										<table id="detalles_espacio" >
											<thead style="background-color:#A9D0F5">
												<tr>
												<th>Nombre</th>
												<th>Capacidad</th>
												<th>Cantidad</th>
												</tr>
											</thead>
											<tbody>
											@foreach($talleres_edecan as $tall)
												<tr>
													<td>{{$tall->nomb}}</td>
													<td>{{$tall->capa}}</td>
													<td>{{$tall->cant}}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									
								
							</div>
							<div >
								
								
										<div class="form-group">
											<label>Exhbiciones</label>
										</div>
									
									
										<table id="detalles_espacio" >

											<thead style="background-color:#A9D0F5">
												<tr>
												<th>Nombre</th>
												<th>Capacidad</th>
												<th>Cantidad</th>
												</tr>
											</thead>
											<tbody>
											@foreach($exhibiciones_edecan as $exhi)
												<tr>
													<td>{{$exhi->nomb}}</td>
													<td>{{$exhi->capa}}</td>
													<td>{{$exhi->cant}}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									
							</div>
                                  <!--Fin Contenido-->
                           
                    <!-- /.row -->
                
              </div><!-- /.box -->
		@endif

</body>
