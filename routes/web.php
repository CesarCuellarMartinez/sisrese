<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('prueba', function(){
	return "Hola desde routes.php";
});
Route::get('/nalgas', function () {
   return view('adminlte::reserva/reserva/seleccionarHoras');
});
Route::get('/alv', function () {
   return view('adminlte::reserva.grafica.index2',["anio"=>date("Y"),"mes"=>date("m")]);
});
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/reserva/seleccionarHoras', 'ReservaController@seleccionarHoras');
Route::resource('/reserva','ReservaController');

//Route::resource('/reserva/eli','ReservaController@eli');

Route::resource('/asignar','AsignarController');
Route::resource('/edecan','EdecanController');
Route::resource('/asignar','AsignarController');
Route::resource('/taquilla','TaquillaController');
Route::resource('/instituto','InstitutoController');
Route::resource('/espacio','EspacioController');
Route::resource('/taller','TallerController');
Route::resource('/taller/destroy','TallerController@destroy');
Route::resource('/exhibicion','ExhibicionController');
Route::resource('/paquete','PaqueteController');
Route::resource('/hora','HoraController');
Route::resource('/horario','HorarioController');
Route::resource('/chart','ChartsController@area');
Route::resource('/insti','ChartsController@total_reservaciones');
Route::resource('/cantiRes','ChartsController@cantidad_reservas');
Route::resource('/usua','ChartsController@reservaciones_usuarios_mes');
Route::resource('/grafica','GraficasController@index');
Route::resource('/grafica/index2','GraficasController@index2');
Route::get('grafica_registros/{anio}/{mes}', 'GraficasController@registros_mes');
Route::get('grafica_reservas', 'GraficasController@total_reservaciones');
Route::get('/reserva/eli/{id}', 'ReservaController@eli');
Route::get('/chart/pdf/{id}', 'ChartsController@pdf');
Route::get('/reserva/con/{id}', 'ReservaController@con');
Route::get('/asignar/con/{id}', 'AsignarController@con');
Route::get('/asignar/des/{id}', 'AsignarController@des');
Route::get('/taller/eli/{id}', 'TallerController@eli');
Route::get('/instituto/eli/{id}', 'InstitutoController@eli');
Route::get('/espacio/eli/{id}', 'EspacioController@eli');
Route::get('/exhibicion/eli/{id}', 'ExhibicionController@eli');
Route::get('/paquete/eli/{id}', 'PaqueteController@eli');
Route::get('/hora/eli/{id}', 'HoraController@eli');
Route::resource('evento','EventoController@api');
Route::get('api','EventoController@api'); //ruta que nos devuelve los eventos en formato json
Route::get('pdf2', function(){
	$pdf = PDF::loadView('adminlte::reserva.reserva.show');
	return $pdf->download('archivo.pdf');
} );
