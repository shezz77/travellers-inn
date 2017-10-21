$( document ).ready(function() {
    $(".table").find('tbody').find('.edit').on('click', function (event) {
        event.preventDefault();
        let url = $(this).attr('data-value');

        console.log(url);

        $.ajax({
            type: 'GET',
            url: url,

            success: res => {
                console.log(res);
                $('#id1').val(res.data.id);
                $('#name1').val(res.data.name);
                $('#description1').val(res.data.description);
                $('#modal').modal();
            },

            error: res => {
                console.log(res);
            }
        });


    })
});