jQuery(document).ready(function ($) {

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 200) {
            $("header#masthead").addClass("darkHeader");
        } else {
            $("header#masthead").removeClass("darkHeader");
        }
    }); //missing );
    $(".button1").click(function() {
        $('html, body').animate({
            scrollTop: $("#approach").offset().top
        }, 1500);
    });
});

