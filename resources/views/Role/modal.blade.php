
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$rol->id}}">

{{Form::open(array('action'=>array('RoleController@destroy',$rol->id),'method'=>'delete'))}}

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" arial-label="Close">

                <span aria-hidden="true">x</span>
            </button>
            <h4 class="modal-title">Eliminar Rol</h4>
        </div>

        <div class="modal-body">
            <p>Confirme Si Desea Eliminar El Rol</p>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-fire"></span> Confirmar </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-repeat"></span> Cancelar </button>
        </div>
    </div>
</div>
   {{Form::Close()}}

</div>
