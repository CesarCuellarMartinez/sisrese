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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/reserva/seleccionarHoras', 'ReservaController@seleccionarHoras');
Route::resource('/reserva','ReservaController');
Route::resource('/edecan','EdecanController');
Route::resource('/instituto','InstitutoController');
Route::resource('/espacio','EspacioController');
Route::resource('/taller','TallerController');
Route::resource('/exhibicion','ExhibicionController');
Route::resource('/paquete','PaqueteController');
Route::resource('/hora','HoraController');
Route::resource('/horario','HorarioController');
Route::resource('/grafica','GraficasController@index');
Route::get('grafica_registros/{anio}/{mes}', 'GraficasController@registros_mes');
Route::get('grafica_reservas', 'GraficasController@total_reservaciones');

Route::get('pdf', function(){
	$pdf = PDF::loadView('viewpdf');
	return $pdf->download('archivo.pdf');
} );
