<div class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Role <span></span></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => 'role.update', 'method' => 'PUT']) }}
                {{ Form::label('id', 'Role ID:') }}
                {{ Form::hidden('id', null, ['id' => 'id1']) }}
                {{ Form::label('name', 'Role Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name1']) }}
                {{ Form::label('display_name', 'Role Display Name:') }}
                {{ Form::text('display_name', null, ['class' => 'form-control', 'id' => 'display_name1']) }}
                {{ Form::label('description', 'Role Description:') }}
                {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description1']) }}
                {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            </div>
        </div>
    </div>
</div>