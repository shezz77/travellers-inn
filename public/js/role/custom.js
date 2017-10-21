$( document ).ready(function() {
    $(".table").find('tbody').find('.edit').on('click', function (event) {
        event.preventDefault();
        let id = event.target.parentNode.parentNode.childNodes[1].textContent;
        let url = $(this).attr('data-value');

        $.ajax({
            type:"GET",
            url: url,
            success:function(res){
                console.log(res.data);
                $('#id1').val(res.data.id);
                $('#name1').val(res.data.name);
                $('#display_name1').val(res.data.display_name);
                $('#description1').val(res.data.description);
                $('#modal').modal();
            },

            error:function () {
                console.log("Error");
            }
        });
    })
});


$("#checkAllPost").click(function () {
    $(".checkPost").prop('checked', $(this).prop('checked'));
});

$("#checkAllUser").click(function () {
    $(".checkUser").prop('checked', $(this).prop('checked'));
});

$("#checkAllAdmin").click(function () {
    $(".checkAdmin").prop('checked', $(this).prop('checked'));
});

$("#checkAllCategory").click(function () {
    $(".checkCategory").prop('checked', $(this).prop('checked'));
});

$("#checkAllRole").click(function () {
    $(".checkRole").prop('checked', $(this).prop('checked'));
});

$("#checkAllResource").click(function () {
    $(".checkResource").prop('checked', $(this).prop('checked'));
});

$("#checkAllHashTags").click(function () {
    $(".checkHashTag").prop('checked', $(this).prop('checked'));
});

$("#checkAllSliders").click(function () {
    $(".checkSlider").prop('checked', $(this).prop('checked'));
});


