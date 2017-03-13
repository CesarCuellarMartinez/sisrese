@if (Auth::user()->valido == 1)
@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

	<div class="container-fluid spark-screen">
		<div class="row">

			<div id="calendar"></div></div>
		</div>

	</div>
@endsection
@push('scripts')

    <script>
        //inicializamos el calendario al cargar la pagina
        $(document).ready(function() {
 			var currentLangCode='es';
            $('#calendar').fullCalendar({
            	eventClick: function(calEvent, jsEvent, view){
            		$(this).css('background', 'red');
            	},
                header: {
                    left: 'prev,next today myCustomButton',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                lang:currentLangCode,
                editable:true,
                eventLimit:true,
                events:{
                	url:'http://localhost/sisrese/public/evento/api'
 				}
            });
 
        });
    </script>
@endpush

@endif