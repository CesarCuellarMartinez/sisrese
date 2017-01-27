<div class="modal  modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$paqu->id}}">
	{{Form::Open(array('action'=>array('PaqueteController@destroy',$paqu->id),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" arial-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Cancelar Reserva</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Cancelar la reserva</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<a href="{{URL::action('PaqueteController@eli',$paqu->id)}}"><button class="btn btn-info">
				
				Confirmar</button></a>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>