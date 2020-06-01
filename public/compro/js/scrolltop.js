$(document).ready(function() {

    //show botton when scroll down
    var stickyNavTop = $('.sticky-anchor').offset().top;
    var stickyNav = function(){
        var scrollTop = $(window).scrollTop();
        if (scrollTop > stickyNavTop) { 
            $('.ri-scrolltop').addClass('show');
            $('.ri-stickyhead').addClass('show');
        } else {
            $('.ri-scrolltop').removeClass('show');
            $('.ri-stickyhead').removeClass('show');
        }
    };
    $(window).scroll(function() {
        stickyNav();
    });

    //back to top when click
    var scrollTop = $(".ri-scrolltop");
    $(scrollTop).click(function() {
        $('html, body').animate({
          scrollTop: 0
        }, 600);
        return false;
    });
});