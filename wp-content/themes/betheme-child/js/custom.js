jQuery(document).ready(function ($) {
    $('#slide-6-layer-1').attr('data-aos', 'zoom-out-up');
    $('#slide-6-layer-10').attr('data-aos', 'zoom-out-up');
    $('#slide-6-layer-11').attr('data-aos', 'fade-right', 'data-aos-offset', '300');

    $("<div class='progress-bar2' id='myborder'></div>").appendTo("#slide-7-layer-1");

    //$("<div class='progress-bar3' id='myborder2'></div>").appendTo(".full-stack");
    $("<div class='progress-bar4' id='myborder3'></div>").appendTo(".Animations-box .column.mcb-column.one.column_column .column_attr");
    $("<div class='progress-bar5' id='myborder4'></div>").appendTo(".myslider .tp-parallax-wrap .tp-mask-wrap");
    
    setTimeout(function () {
        $(".progress-bar2").addClass('mainborder');
        $('#stackheading').addClass('bigborder');
        $('#leverageheading').addClass('bigborder');
        $('#slide-5-layer-1').addClass('bigborder');
        $('#slide-3-layer-1').addClass('bigborder');
    }, 2000);
});

$(function () {

    var $sidescroll = (function () {

        // the row elements
        var $rows = $('#ss-container > div.ss-row'),
                // we will cache the inviewport rows and the outside viewport rows
                $rowsViewport, $rowsOutViewport,
                // navigation menu links
                $links = $('#ss-links > a'),
                // the window element
                $win = $(window),
                // we will store the window sizes here
                winSize = {},
                // used in the scroll setTimeout function
                anim = false,
                // page scroll speed
                scollPageSpeed = 2000,
                // page scroll easing
                scollPageEasing = 'easeInOutExpo',
                // perspective?
                hasPerspective = false,
                perspective = hasPerspective && Modernizr.csstransforms3d,
                // initialize function
                init = function () {

                    // get window sizes
                    getWinSize();
                    // initialize events
                    initEvents();
                    // define the inviewport selector
                    defineViewport();
                    // gets the elements that match the previous selector
                    setViewportRows();
                    // if perspective add css
                    if (perspective) {
                        $rows.css({
                            '-webkit-perspective': 100,
                            '-webkit-perspective-origin': '50% 0%'
                        });
                    }
                    // show the pointers for the inviewport rows
                    $rowsViewport.find('a.ss-circle').addClass('ss-circle-deco');
                    // set positions for each row
                    placeRows();

                },
                // defines a selector that gathers the row elems that are initially visible.
                // the element is visible if its top is less than the window's height.
                // these elements will not be affected when scrolling the page.
                defineViewport = function () {

                    $.extend($.expr[':'], {
                        inviewport: function (el) {
                            if ($(el).offset().top < winSize.height) {
                                return true;
                            }
                            return false;
                        }

                    });

                },
                // checks which rows are initially visible 
                setViewportRows = function () {

                    $rowsViewport = $rows.filter(':inviewport');
                    $rowsOutViewport = $rows.not($rowsViewport)

                },
                // get window sizes
                getWinSize = function () {

                    winSize.width = $win.width();
                    if (winSize.width > 1400 || winSize.width < 1600) {
                        winSize.height = $win.height() - 300;
                    } else if (winSize.width > 1600) {
                        winSize.height = $win.height() - 400;
                    } else {
                        winSize.height = $win.height();
                    }
                },
                // initialize some events
                initEvents = function () {

                    // navigation menu links.
                    // scroll to the respective section.
                    $links.on('click.Scrolling', function (event) {

                        // scroll to the element that has id = menu's href
                        $('html, body').stop().animate({
                            scrollTop: $($(this).attr('href')).offset().top
                        }, scollPageSpeed, scollPageEasing);

                        return false;

                    });

                    $(window).on({
                        // on window resize we need to redefine which rows are initially visible (this ones we will not animate).
                        'resize.Scrolling': function (event) {

                            // get the window sizes again
                            getWinSize();
                            // redefine which rows are initially visible (:inviewport)
                            setViewportRows();
                            // remove pointers for every row
                            $rows.find('a.ss-circle').removeClass('ss-circle-deco');
                            // show inviewport rows and respective pointers
                            $rowsViewport.each(function () {

                                $(this).find('div.ss-left')
                                        .css({left: '0%'})
                                        .end()
                                        .find('div.ss-right')
                                        .css({right: '0%'})
                                        .end()
                                        .find('a.ss-circle')
                                        .addClass('ss-circle-deco');

                            });

                        },
                        // when scrolling the page change the position of each row	
                        'scroll.Scrolling': function (event) {

                            // set a timeout to avoid that the 
                            // placeRows function gets called on every scroll trigger
                            if (anim)
                                return false;
                            anim = true;
                            setTimeout(function () {

                                placeRows();
                                anim = false;

                            }, 10);

                        }
                    });

                },
                // sets the position of the rows (left and right row elements).
                // Both of these elements will start with -50% for the left/right (not visible)
                // and this value should be 0% (final position) when the element is on the
                // center of the window.
                placeRows = function () {

                    // how much we scrolled so far
                    var winscroll = $win.scrollTop(),
                            // the y value for the center of the screen
                            winCenter = winSize.height / 2 + winscroll;

                    // for every row that is not inviewport
                    $rowsOutViewport.each(function (i) {

                        var $row = $(this),
                                // the left side element
                                $rowL = $row.find('div.ss-left'),
                                // the right side element
                                $rowR = $row.find('div.ss-right'),
                                // top value
                                rowT = $row.offset().top;

                        // hide the row if it is under the viewport
                        if (rowT > winSize.height + winscroll) {

                            if (perspective) {

                                $rowL.css({
                                    '-webkit-transform': 'translate3d(-75%, 0, 0) rotateY(-90deg) translate3d(-75%, 0, 0)',
                                    'opacity': 0
                                });
                                $rowR.css({
                                    '-webkit-transform': 'translate3d(75%, 0, 0) rotateY(90deg) translate3d(75%, 0, 0)',
                                    'opacity': 0
                                });

                            } else {

                                $rowL.css({left: '-14%'});
                                $rowR.css({right: '-55%'});
								
								$rowL.css({width: '60%'});
                                $rowR.css({width: '60%'});

                            }

                        }
                        // if not, the row should become visible (0% of left/right) as it gets closer to the center of the screen.
                        else {

                            // row's height
                            var rowH = $row.height(),
                                    // the value on each scrolling step will be proporcional to the distance from the center of the screen to its height
                                    factor = (((rowT + rowH / 2) - winCenter) / (winSize.height / 2 + rowH / 2)),
                                    // value for the left / right of each side of the row.
                                    // 0% is the limit
                                    val = Math.max(factor * 50, 0);

                            if (val <= 0) {

                                // when 0% is reached show the pointer for that row
                                if (!$row.data('pointer')) {

                                    $row.data('pointer', true);
                                    $row.find('.ss-circle').addClass('ss-circle-deco');

                                }

                            } else {

                                // the pointer should not be shown
                                if ($row.data('pointer')) {

                                    $row.data('pointer', false);
                                    $row.find('.ss-circle').removeClass('ss-circle-deco');

                                }

                            }

                            // set calculated values
                            if (perspective) {

                                var t = Math.max(factor * 75, 0),
                                        r = Math.max(factor * 90, 0),
                                        o = Math.min(Math.abs(factor - 1), 1);

                                $rowL.css({
                                    '-webkit-transform': 'translate3d(-' + t + '%, 0, 0) rotateY(-' + r + 'deg) translate3d(-' + t + '%, 0, 0)',
                                    'opacity': o
                                });
                                $rowR.css({
                                    '-webkit-transform': 'translate3d(' + t + '%, 0, 0) rotateY(' + r + 'deg) translate3d(' + t + '%, 0, 0)',
                                    'opacity': o
                                });

                            } else {

                                $rowL.css({left: -val + '-14%'});
                                $rowR.css({right: -val + '-55%'});
								
								$rowL.css({width: '100%'});
                                $rowR.css({width: '100%'});

                            }
                        }
                    });
                };

        return {init: init};

    })();

    $sidescroll.init();


    window.onscroll = function () {
        myFunction()
    };
    function myFunction() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 200;
        var scrolled_var = (winScroll / height) * 30;
        var scrolled_var_nw = (winScroll / height) * 20;
        try{ document.getElementById("myBar").style.width = scrolled + "%"; }catch(err){}
        try{ document.getElementById("myBar1").style.width = scrolled_var + "%"; }catch(err){}
        try{ document.getElementById("myBar2").style.width = scrolled_var_nw + "%"; }catch(err){}
    }    
});

function adjustHeights(){
    if( $('#approach-item-section .icon_box').length > 0 ){
        equalHeights('#approach-item-section .icon_box');
    }
    if( $('.top-skew .mcb-column .column_attr').length > 0 ){
        equalHeights('.top-skew .mcb-column .column_attr');
    }
    if( $('#price-compare .mcb-wrap-inner .column.one-third > .column_attr .expertise-box').length > 0 ){
        equalHeights('#price-compare .mcb-wrap-inner .column.one-third > .column_attr .expertise-box');
    }
}
document.addEventListener('DOMContentLoaded',function(){
    if( $( window ).width() > 760 ){
        setTimeout(function(){
            adjustHeights();
        },2000);
    }
    
    $( window ).resize(function() {
        if( $( window ).width() > 760 ){
            setTimeout(function(){
                adjustHeights();
            },1000);
        }
    });
    
    $(".arrow-down-click").click(function() {
        try{
            var id = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(id).offset().top
            }, 2000);
        }catch(err){}
        return false;
    });
    
    /*For services page*/
    $('#price-compare .mcb-column:nth-of-type(3) .expertise-box').addClass('hovered');
    $('#price-compare .mcb-column .expertise-box').hover(
        function(){
            $('#price-compare .mcb-column .expertise-box').removeClass('hovered');
            $(this).addClass('hovered');
        },
        function(){
            $('#price-compare .mcb-column .expertise-box').removeClass('hovered');
            $('#price-compare .mcb-column:nth-of-type(3) .expertise-box').addClass('hovered');
        }        
    );
    
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 130) {
            if(isScrolledIntoView("#form-fiix") || isScrolledIntoView("#footr-updat")){
                $(".landing-page-template #Top_bar").removeClass("sticky");
            }
            else{
                $(".landing-page-template #Top_bar").addClass("sticky");
            }
            if($(window).scrollTop()+$(window).height() >= ($(document).height()-($('#form-fiix').height() + $('#footr-updat').height()))) {
                $(".landing-page-template #Top_bar").removeClass("sticky");
            }
        } else {
            $(".landing-page-template #Top_bar").removeClass("sticky");
        }
    });
    
    $(".landing-page-template #Top_bar .menu > li:last-of-type > a, .landing-page-template #Side_slide .menu > li:last-of-type > a").click(function(e) {
        e.preventDefault();
        if( $('#Side_slide').hasClass('enabled') ){
            $('#Side_slide').css('right','-'+$('#Side_slide').data('width')+'px');
            $('body').css('left','0px');
            $('#body_overlay').css('display','none');
            scroll_to = $("#form-fiix .camp-col-contact").offset().top-50;
        }else{
            scroll_to = $("#form-fiix").offset().top-140;
        }
        $('html, body').animate({
            scrollTop: scroll_to
        }, 2000);
    });
    
});

function isScrolledIntoView(elem){
    var $elem = $(elem);
    var $window = $(window);

    var docViewTop = $window.scrollTop();
    var docViewBottom = docViewTop + $window.height();

    var elemTop = $elem.offset().top;
    var elemBottom = elemTop + $elem.height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function equalHeights(container){
    var highestBox = 0;
    $(container).each(function(){
        if($(this).height() > highestBox) {
            highestBox = $(this).height(); 
        }
    });
    $(container).attr("style","height: "+highestBox+"px !important;");
}

// $(window).scroll(function() {
//     if( $("#particles-js").length > 0 ){
//         var scroll = $(window).scrollTop();
//         if (scroll >= 300) {
//             //clearHeader, not clearheader - caps H
//             $("#particles-js").addClass("hiddenall");
//         }else {
//             $("#particles-js").removeClass("hiddenall");
//         }
//     }
// }); //missing );

// $(document).ready(function() {
//     var divHeight = $('#intro-banner-section').height(); 
//     $('#particles-js').css('min-height', divHeight+'px');
// });

jQuery(document).ready(function() {
  jQuery(".boxed-exper1, .boxed-exper3").on('mouseenter',function() {
    jQuery(".boxed-exper2").addClass("hover-hax");
  }).on('mouseleave',function(){
    jQuery(".boxed-exper2").removeClass("hover-hax");
  });
  
  jQuery('.camp-col-contact textarea').removeAttr('placeholder');
  
  jQuery('.submit-contact-form').click(function(){
    jQuery('form.wpcf7-form').submit();
    return false;
  });
});