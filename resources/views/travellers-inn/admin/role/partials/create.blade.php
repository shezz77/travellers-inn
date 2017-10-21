<!--Modal Logout-->
<div class="md-modal md-3d-slit" id="cerate-role-modal">
    <div class="md-content">
        <h3><strong>Create Role</strong> </h3>
        <div style="padding: 5px 22px 48px;">
            <div id="basic-form">
                <form role="form" action="{{ route('role.store') }}" id="role-create-form" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    @include('travellers-inn.admin.role.partials.form')
                    <br>
                    <button type="button" class="btn btn-darkblue-1 md-close" style="float: right;margin-left: 10px;padding: 7px;">Cancel</button>
                    <button type="submit" class="btn btn-darkblue-1" style="float: right;background-color: #68C39F !important">Create Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
