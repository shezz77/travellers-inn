$("#select-country-tip").change(function(){
    var countryID = $(this).val();
    var stateUrl = $('#get-state-url').attr('data-url');
    console.log(stateUrl)
    if(countryID){
        $.ajax({
            type:"GET",
            url: stateUrl,
            data: 'country_id='+countryID,

            success:function(res){
                if(res){
                    console.log(res);
                    $("#select-state-tip").empty();
                    $("#select-state-tip").append('<option disabled>- Select your State -</option>');
                    $.each(res,function(key,value){
                        $("#select-state-tip").append('<option value="'+value['id']+'">'+value['title']+'</option>');
                    });
                }else{
                    $("#select-state-tip").empty();
                }
            }
        });
    }else{
        $("#select-state-tip").empty();
    }
});

$("#select-country-image").change(function(){
    var countryID = $(this).val();
    var stateUrl = $('#get-state-url').attr('data-url');
    console.log(stateUrl)
    if(countryID){
        $.ajax({
            type:"GET",
            url: stateUrl,
            data: 'country_id='+countryID,

            success:function(res){
                if(res){
                    console.log(res);
                    $("#select-state-image").empty();
                    $("#select-state-image").append('<option disabled>- Select your State -</option>');
                    $.each(res,function(key,value){
                        $("#select-state-image").append('<option value="'+value['id']+'">'+value['title']+'</option>');
                    });
                }else{
                    $("#select-state-image").empty();
                }
            }
        });
    }else{
        $("#select-state-image").empty();
    }
});

$("#select-country-video").change(function(){
    var countryID = $(this).val();
    var stateUrl = $('#get-state-url').attr('data-url');
    console.log(stateUrl)
    if(countryID){
        $.ajax({
            type:"GET",
            url: stateUrl,
            data: 'country_id='+countryID,

            success:function(res){
                if(res){
                    console.log(res);
                    $("#select-state-video").empty();
                    $("#select-state-video").append('<option disabled>- Select your State -</option>');
                    $.each(res,function(key,value){
                        $("#select-state-video").append('<option value="'+value['id']+'">'+value['title']+'</option>');
                    });
                }else{
                    $("#select-state-video").empty();
                }
            }
        });
    }else{
        $("#select-state-video").empty();
    }
});

$("#select-country-ebook").change(function(){
    var countryID = $(this).val();
    var stateUrl = $('#get-state-url').attr('data-url');
    console.log(stateUrl)
    if(countryID){
        $.ajax({
            type:"GET",
            url: stateUrl,
            data: 'country_id='+countryID,

            success:function(res){
                if(res){
                    console.log(res);
                    $("#select-state-ebook").empty();
                    $("#select-state-ebook").append('<option disabled>- Select your State -</option>');
                    $.each(res,function(key,value){
                        $("#select-state-ebook").append('<option value="'+value['id']+'">'+value['title']+'</option>');
                    });
                }else{
                    $("#select-state-ebook").empty();
                }
            }
        });
    }else{
        $("#select-state-ebook").empty();
    }
});

$(".fullComments").find(".buttonCustomPrimary").on('click',  function (event) {
    event.preventDefault();
    let post_id = $('#post_id').val();
    let comment = $('.commentText').val();
    let data = {_token: token,  post_id, comment};
    $('#commentText').val(' ');
    let count = $('#comment-count').html();
    console.log(count);
    $.ajax({
        type: "POST",
        url: urlComment,
        data: data,
        dataType: 'json',
        // async: false,
        success: function(response){ // What to do if we succeed
            console.log(response);
            let profile = `${APP_URL}/user/profile/${response.data.comment.user_id}`;
            let image = `${APP_URL}/images/users/${response.data.comment.user_id}/${response.data.dataArray.user_image}`;
            let deleteUrl = `${APP_URL}/delete/${response.data.comment.id}`;


            let body = $('#comment-body');
            let commentDiv = `<div class="media comment1">
                                            <a href="${profile.replace(/['"]+/g, '')}">
                                                <img src="${image.replace(/['"]+/g, '')}" alt="Image" class="img-circle" width="50" height="50">
                                            </a>
                                            <div class="media-body comment" data-commentid = "${response.data.comment.id}"}}>
                                                <h4 class="media-heading">${response.data.dataArray.user_name}</h4>
                                                <input type="text" hidden name="id" id="comment_id" value="${response.data.comment.id}">
                                                <h4><span><i class="fa fa-calendar" aria-hidden="true"></i>${response.data.dataArray.comment_date}</span></h4>
                                                <p id="comment">${response.data.comment.comment}</p>

                                                <a class="btn btn-link comment-like-new" onclick="commentLike()">Like</a>
                                                <span id="count">0</span>
                                                    <a class="edit btn btn-link"  id="edit" onclick="commentEdit()">Edit</a>
                                                    <form action="${deleteUrl.replace(/['"]+/g, '')}" role="form" method="Post" enctype="multipart/form-data" style="display: inline-block">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="${token}">
                                                        <button class="btn btn-link" type="button" data-modal="confirmDelete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Comment" data-message="Are you sure you want to Delete this Comment?">Delete</button>
                                                    </form>
                                            </div>
                                        </div>`
            body.prepend(commentDiv);
            count++;
            $('#comment-count').html(count);
        },
        error: function () {
            console.log("failed");
        }

    })
});



function commentLike() {
    event.preventDefault();
    commentId = event.target.parentNode.dataset['commentid'];
    let data = {_token: token, commentId : commentId};
    let likeStatus = $('.comment-like-new');
    // $('#count').html(0);
    let count = $('#count').html();

    $.ajax({
        type: "POST",
        url: urlCommentLike,
        data: data,
        dataType: 'json',
        // async: false,
        success: function(response){ // What to do if we succeed
            let status = response.status;
            console.log(status);
            if(status  === "Liked"){
                $(likeStatus).html('Unlike');
                count++;
            }else {
                $(likeStatus).html('Like');
                count--;
            }
            $('#count').html(count);
        },
        error: function () {
            console.log("failed");
        }

    })
}

function commentEdit() {
    console.log('dasddsads');
        event.preventDefault();
        let id = $('#comment_id').val();
        $('#id').val(id);
        var comment1 = event.target.parentNode.childNodes[7].textContent;
    let comment = $('#commentText').val();

        $('.modalComment').val(comment);
    $('.modalComment').val(comment1);

        $('#modal').modal();


}


// $(".edit").on('click', function (event) {
//     event.preventDefault();
//     var id = $('#comment_id').val();
//     $('#id').val(id);
//     var comment = event.target.parentNode.childNodes[7].textContent;
//     $('.commentText').val(comment);
//
//     $('#modal').modal();
//
// });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(".comment-like").on('click', function (event) {
    event.preventDefault();
    commentId = event.target.parentNode.dataset['commentid'];
    var data = {_token: token, commentId : commentId};
    var likeStatus = $(this);
    var count = $('#comment-like-count').html();

    $.ajax({
        type: "POST",
        url: urlCommentLike,
        data: data,
        dataType: 'json',
        // async: false,
        success: function(response){ // What to do if we succeed
            var status = response.status;
            console.log(status);
            if(status  === "Liked"){
                $(likeStatus).html('Unlike');
                count++;
            }else {
                $(likeStatus).html('Like');
                count--;
            }
            $('#comment-like-count').html(count);
        },
        error: function () {
            console.log("failed");
        }

    })
});


$(".like").on('click', function (event) {
    event.preventDefault();
    postId = event.target.parentNode.dataset['postid'];
    var data = {_token: token, postId : postId};
    var likeStatus = $(this);
    var count = $('#post-like-count').html();


    $.ajax({
        type: "POST",
        url: urlLike,
        data: data,
        dataType: 'json',
        // async: false,
        success: function(response){ // What to do if we succeed
            var status = response.status;
            console.log(status);
            if(status  === "Liked"){
                $(likeStatus).html('Unlike');
                count++;
            } else {
                $(likeStatus).html('Like');
                count--;
            }
            $('#post-like-count').html(count);
        },
        error: function () {
            console.log("failed");
        }

    })
});

$(document).ready(function () {



    $(".follow").on('click', function (event) {
        event.preventDefault();
        var urlfollow = $('#follow-user').attr('data-url');
        var urlunfollowuser = $('#un-follow-user').attr('data-url');
        var followstatus = $(this);
        var s = $(followstatus).html();
        var data = {_token: token};


        if (s === "Follow"){
            $.ajax({
                type: "GET",
                url: urlfollow,
                dataType: 'json',
                // async: false,
                success: function(response){ // What to do if we succeed
                    var progress = response.progress;
                    console.log(progress);
                    if(progress  === "ok"){
                        $(followstatus).html('Unfollow');
                    }
                },
                error: function () {
                    console.log("failed");
                }

            })
        }else if (s === "Unfollow"){
            $.ajax({
                type: "GET",
                url: urlunfollowuser,
                dataType: 'json',
                // async: false,
                success: function(response){ // What to do if we succeed
                    var progress = response.progress;
                    console.log(progress);
                    if(progress  === "ok"){
                        $(followstatus).html('Follow');
                    }
                },
                error: function () {
                    console.log("failed");
                }

            })
        }

    });

});


//delete Modal
$(document).ready(function(){
    $('#confirmDelete').on('show.bs.modal', function (e) {
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body p').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);

        // Pass form reference to modal for submission on yes/ok
        var form = $(e.relatedTarget).closest('form');
        $(this).find('.modal-footer #confirm').data('form', form);
    });
    <!-- Form confirm (yes/ok) handler, submits form -->
    $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
        $(this).data('form').submit();
    });

});
$(document).ready(function(){
    $("#alert").delay(3200).hide(4);
    $("#alert-error").delay(3200).hide(4);
});




$('.commentsForm').parsley();
$('#tip-create-form').parsley();
$('#image-create-form').parsley();
$('#video-create-form').parsley();
$('#ebook-create-form').parsley();
//select 2 plugin initialize
$('.select-plugin').select2();
//hash tag plugins initialize
$('.select2-multi').select2({
    tags: true,
    tokenSeparators: [',', ' ']
});
//image upload plugin initialize
$('.image-upload').fileinput({
    'showUpload':false,
    'previewFileType':'any',
    maxFileCount: 10,
    maxFileSize: 1000,
    allowedFileExtensions: ["jpg", "png", "gif"]
});


window.Parsley.addValidator('maxFileSize', {
    validateString: function(_value, maxSize, parsleyInstance) {
        if (!window.FormData) {
            alert('You are making all developpers in the world cringe. Upgrade your browser!');
            return true;
        }
        var files = parsleyInstance.$element[0].files;
        return files.length != 1  || files[0].size <= maxSize * 1024;
    },
    requirementType: 'integer',
    messages: {
        en: 'This file should not be larger than %s Kb',
        fr: 'Ce fichier est plus grand que %s Kb.'
    }
});
