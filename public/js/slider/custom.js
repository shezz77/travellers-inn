$( document ).ready(function() {
    $(".table").find('tbody').find('.edit').on('click', function (event) {
        event.preventDefault();
        let url = $(this).attr('data-value');

        $.ajax({
            type: 'GET',
            url: url,

            success:function (res) {
               console.log(res.data.name);
                $('#id1').val(res.data.id);
                $('#name1').val(res.data.name);
                $('#description1').val(res.data.description);
                $('#modal').modal();

                $("#destination").empty();
                $("#destination").append('<option>- Select your State -</option>');
                $.each(res.data.all_destination,function(key,value){
                    let output =  "";
                    if (res.data.category_id === value.id){
                        output += '<option selected  value="'+value.id+'">'+value.title+'</option>';
                    }else {
                        output += '<option value="'+value.id+'">'+value.title+'</option>';
                    }

                    $("#destination").append(output);
                });
            },

            error:function (res) {
                console.log(res);
            }
        });
    })
});

// $("#slider-form").parsley();


$(document).ready(function () {
    $('input:radio').on('click',function() {
        var x =  $(this).val();
//                        console.log(x);
        if(x== "continent")
            $("#continent").show();
        else
            $("#continent").hide();
        if(x== "country")
            $("#counts").show();
        else
            $("#counts").hide();

    });
});