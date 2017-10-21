{{--<!--Modal Delete-->--}}
{{--<div class="md-modal md-3d-slit" id="modal-delete-{{ $role->id }}">--}}
    {{--<div class="md-content">--}}
        {{--<h3><strong>Delete</strong> Confirmation</h3>--}}
        {{--<div class="row">--}}
            {{--<p class="text-center">Are you sure want to Delete from this Role?</p>--}}
            {{--<div class="col-md-2 col-lg-offset-2">--}}
                {{--{{ Form::open(['route' => ['role.delete', $role->id], 'method' => 'DELETE']) }}--}}
                {{--{{ Form::submit('Yeah, Im sure', ['class' => 'btn btn-success md-close', 'data-modal' => 'delete-role-modal']) }}--}}
                {{--{{ Form::close() }}--}}
            {{--</div>--}}
            {{--<div class="text-center col-md-6 col-lg-offset-2">--}}
                {{--<button class="btn btn-danger md-close">Nope!</button>--}}
            {{--</div>--}}
            {{--<a href="{{ route('role.delete', $role->id ) }}" class="btn btn-success md-close">Yeah, I'm sure</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>        <!-- Modal End -->--}}

<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Permanently</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure about this ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm">Delete</button>
            </div>
        </div>
    </div>
</div>