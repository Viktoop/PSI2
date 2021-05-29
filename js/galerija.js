//Milos Stupar 0669/15
var slika, slikaTop, hSpace, wSpace, wFrame;

$(document).ready(function(){
    galerijaInit();
    streliceInit();
    uoGalerijaInit();
});

$("img.d-block.w-100").click(function(){
    $("body").css({"overflow":"hidden", "margin-right":"15px"});
    $(".maska").show();   
    resizeGlavnaSlika();
    streliceInit();
    slikeDoleResize();
});

$(".uo-slika").click(function(){
    $("body").css({"overflow":"hidden", "margin-right":"15px"});
    $(".maska").show();   
    $(".glavna-slika").attr('src', $(this).attr('src') );
    index = $(".uo-slika").index($(this));
    $(".glavna-slika").attr('pos',  index);
    resizeGlavnaSlika();
    streliceInit();
    slikeDoleResize();
    $(".g-slika").each(function(){
        $(this).removeClass("g-selected");
    });
    $($(".g-slika")[index]).addClass("g-selected");

});

$( window ).resize(function() {
    resizeGlavnaSlika();
    streliceInit();
    slikeDoleResize();
    uoGalerijaInit();
});

$(".maska").click(function(){
    $("body").css({"overflow":"auto", "margin-right":"0"});
    $(".maska").hide();
});

$(".maska img").click(function(e) {
    e.stopPropagation();
});

$(".maska i").click(function(e) {
    e.stopPropagation();
});

function galerijaInit(){

    //Dinamicki ucitava link prve slike sa stranice UO u glavnu sliku
    $(".glavna-slika").attr('src', $( $(".uo-slika")[0] ).attr('src') );

    // Dinamicki ucitava linkove slika na dnu galirije od slika sa stranice UO
    for (i=0; i<9; i++) $( $(".g-slika")[i] ).attr('src', $( $(".uo-slika")[i] ).attr('src') );

    resizeGlavnaSlika();
}

function resizeGlavnaSlika(){
    // Postavlja width glavne slike u odnosu na dimenzije slike i dimenzije ekrana
    slikeDole = $(".slike-dole");
    slika = $(".glavna-slika");
    faktor = 0.9;

    wSpace = window.innerWidth;
    hSpace = window.innerHeight - slikeDole.height();
    ekranRatio = wSpace / hSpace;

    if (ekranRatio>1) {
        hFrame = hSpace * faktor;
        wFrame = hFrame / 3 * 4;
    }else{
        wFrame = wSpace * faktor;
        hFrame = wFrame / 4 * 3;
    }

    frameRatio = wFrame / hFrame;
    slikaRatio = slika.width() / slika.height();
    

    if (slikaRatio >= frameRatio) slika.outerWidth( wFrame );
    else slika.outerWidth( hFrame * slikaRatio);

    // Centrira glavnu sliku na ekranu
    slikaTop  = (hSpace - slika.outerHeight()) / 2;
    slikaLeft = (wSpace - slika.outerWidth() ) / 2;
    slika.css({"top": slikaTop + "px", "left": slikaLeft + "px"});
}

 // Pozicionira strelice i odredjuje im velicinu
 function streliceInit(){
    levo  = $("#strelica-levo");
    desno = $("#strelica-desno");

    levo.css({ "font-size": hSpace*0.1 + "px"});
    desno.css({ "font-size": hSpace*0.1 + "px"});

    levo.css({ "top": slikaTop + (slika.outerHeight() - levo.outerHeight())  / 2 + "px", "left": ( wSpace - wFrame ) / 2 - 3.2*levo.width() + "px"});
    desno.css({"top": slikaTop + (slika.outerHeight() - desno.outerHeight()) / 2 + "px", "left":  ( wSpace - wFrame ) / 2 + wFrame + 2*desno.width() + "px"});
 }

// Postavlja src glavne slike da budi isti kao i src slike na dnu na koju je kliknuto
$(".g-slika").click(function(){
    $(".glavna-slika").attr('src', $(this).attr('src') );
    $(".glavna-slika").attr('pos', $(this).attr('pos') );
    resizeGlavnaSlika();
    $(".g-slika").each(function(){
        $(this).removeClass("g-selected");
    });
    $(this).addClass("g-selected");
});

// Menja glavnu sliku u levo u odnosu na slilke na dnu
$("#strelica-desno").click(function(){
    pos = parseInt( $(".glavna-slika").attr('pos'), 10);
    $( $(".g-slika")[pos] ).toggleClass("g-selected");
    pos = (pos + 1) % 9;
    $( $(".g-slika")[pos] ).toggleClass("g-selected");
    $(".glavna-slika").attr('src', $( $(".uo-slika")[pos] ).attr('src') );
    $(".glavna-slika").attr('pos', pos);
    resizeGlavnaSlika();
});

// Menja glavnu sliku u desno u odnosu na slilke na dnu
$("#strelica-levo").click(function(){
    pos = parseInt( $(".glavna-slika").attr('pos'), 10);
    $( $(".g-slika")[pos] ).toggleClass("g-selected");
    pos = pos - 1;
    if (pos == -1) pos = 8;
    $( $(".g-slika")[pos] ).toggleClass("g-selected");
    $(".glavna-slika").attr('src', $( $(".uo-slika")[pos] ).attr('src') );
    $(".glavna-slika").attr('pos', pos);
    resizeGlavnaSlika();
});

function slikeDoleResize(){
    maxWidth = $(".g-slika-container").innerWidth();
    maxHeight = $(".slike-dole").height();
    height = 300;
    totalWidth = 0;
    $(".g-slika").each(function(){
        ratio = $(this).outerWidth() / $(this).outerHeight();
        $(this).outerHeight(height);
        $(this).outerWidth(height * ratio);

        totalWidth += $(this).outerWidth();
    });

    ratio = maxWidth / totalWidth;
    height = height *  ratio;
    $(".g-slika").each(function(){
        ratio = $(this).outerWidth() / $(this).outerHeight();
        $(this).outerHeight(height);
        $(this).outerWidth(height * ratio);
    });
}

function uoGalerijaInit(){
    maxWidth = $(".uo-slika-container").innerWidth();
    height = 300;
    totalWidth = 0;
    $(".uo-slika").each(function(){
        ratio = $(this).outerWidth() / $(this).outerHeight();
        $(this).outerHeight(height);
        $(this).outerWidth(height * ratio);

        totalWidth += $(this).outerWidth();
    });

    ratio = maxWidth / totalWidth;
    height = height *  ratio;
    $(".uo-slika").each(function(){
        ratio = $(this).outerWidth() / $(this).outerHeight();
        $(this).outerHeight(height);
        $(this).outerWidth(height * ratio);
        $(this).show();
    });

}

