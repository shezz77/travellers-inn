
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <img src="{{ asset('images/users/'. $user->id .'/' . $user->image ) }}"
                     style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h4 class="modal-title" id="myModalLabel">{{ $user->user_name }}'s Profile</h4>
            </div>
            <div class="modal-body">
                <center>
                    <h3 class="media-heading"></h3>
                    <form enctype="multipart/form-data" action="{{ route('profile.image.update') }}" method="post">
                        <div class="row">
                            <label>Upload Profile Picture</label>
                            <input type="file" name="image">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <br>
                            <div class="col-md-6 col-md-offset-3">
                                <input type="submit" class="btn btn-block buttonCustomPrimary">
                            </div>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>
