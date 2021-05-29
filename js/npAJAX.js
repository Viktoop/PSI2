//Viktor Galindo 0655/13
$(document).ready(function(){
    executeAJAX();
    naVrhInit();
    $([document.documentElement, document.body]).animate({
        scrollTop: 0
    }, 1);
});

$(".np-checkbox").click(function(){
    executeAJAX();
});

function collectData(){
    data = [];
    $(".np-checkbox").each(function(){
        if ($(this).prop("checked")){
             data[$(this).attr('name')] = $(this).attr('value');
        }
    });
    return data;
}

function executeAJAX(){
    $("#np-rezultati").html("");

    data = collectData();
    $.ajax({
        method: "POST",
        url: "naprednaPretraga",
        data: Object.assign({}, data)
      })
        .done(function( msg ) {
           response = jQuery.parseJSON(msg);
           $("#count").html(response.count);
           if (response.count){
            $("#np-rezultati").show();
            $("#np-rezultati").html(response.data);
           }else $("#np-rezultati").hide();
          
        });
}

$("#pogledaj-rezultate").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#np-rezultati").offset().top - $(".navbar").height()
    }, 1000);
});

function naVrhInit(){
    $("#vrati-na-vrh").hide();
    $("#vrati-na-vrh").css({"bottom" : $(".footer").outerHeight() , "right": $("#vrati-na-vrh").width()/4 });
    
}

$("#vrati-na-vrh").click(function(){
    $([document.documentElement, document.body]).animate({
        scrollTop: 0
    }, 500);
});

$(window).on("scroll", function() {
    var scrollPosition = $(window).scrollTop();
    if (scrollPosition >= $(window).innerHeight()) $("#vrati-na-vrh").fadeIn();
    else $("#vrati-na-vrh").fadeOut();
});