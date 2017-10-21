/**
 * Created by soft on 5/2/2017.
 */

$(".select-plugin").select2();

$('#select-country').change(function(){
    var countryID = $(this).val();
    var stateUrl = $('#get-state-url').attr('data-url');
    if(countryID){
        $.ajax({
            type:"GET",
            url: stateUrl,
            data: 'country_id='+countryID,
            success:function(res){
                if(res){
                    $("#select-state").empty();
                    $("#select-state").append('<option>- Select your State -</option>');
                    $.each(res,function(key,value){
                        $("#select-state").append('<option value="'+key+'">'+value+'</option>');
                    });

                }else{
                    $("#select-state").empty();
                }
            }
        });
    }else{
        $("#select-state").empty();
    }
});
// $('#state').on('change',function(){
//     var stateID = $(this).val();
//     if(stateID){
//         $.ajax({
//             type:"GET",
//             url:"{{url('api/get-city-list')}}?state_id="+stateID,
//             success:function(res){
//                 if(res){
//                     $("#city").empty();
//                     $.each(res,function(key,value){
//                         $("#city").append('<option value="'+key+'">'+value+'</option>');
//                     });
//
//                 }else{
//                     $("#city").empty();
//                 }
//             }
//         });
//     }else{
//         $("#city").empty();
//     }
//
// });
