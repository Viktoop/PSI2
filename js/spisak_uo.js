//Lazar Ristic 0658/15
$(document).ready(function(){
    fixHeight();
});

$( window ).resize(function() {
    fixHeight();
});

function fixHeight(){
    $(".spisak-uo").each(function(){
        visina = $( $(".uo-vidljivost")[0] ).outerHeight();
        $(this).outerHeight( visina );
        $(this).css({"padding-top": visina/2 - 8});
    });
}