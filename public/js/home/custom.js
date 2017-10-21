
$(".northamerica").hide();
$("#northamerica").click(function(){
    $(".northamerica").show();
});
$(".europe").hide();
$("#europe").click(function(){
    $(".europe").show();
});
$(".southamerica").hide();
$("#southamerica").click(function(){
    $(".southamerica").show();
});
$(".oceania").hide();
$("#oceania").click(function(){
    $(".oceania").show();
});
$(".africa").hide();
$("#africa").click(function(){
    $(".africa").show();
});

$('.cities').hide();

// $('.continent').on('mouseover',function () {
//     $(this).find('.cities').hide();
// })
$('.country-des').on('mouseover',function () {
    // console.log("dsdad");
    $(this).find('.cities').show();
}).mouseout(function(){
    $(this).find('.cities').hide();
});

$(function() {
$("#form-login-modal").parsley()
});



