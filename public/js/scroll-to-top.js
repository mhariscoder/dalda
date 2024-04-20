$(function () {
    $(window).scroll(function () {
        if ($('#main-container').length) {
            let scrollLink = $('.scroll-top');
            if ($(window).scrollTop() >= 110) {
                $('.scroll-top').fadeIn();
                scrollLink.addClass('open');
            } else {
                $('.scroll-top').fadeOut();
                scrollLink.removeClass('open');
            }
        }
    });
    $(".scroll-top").click(function () {
        let target = $(this).attr('data-target');
        $("html, body").animate({
            scrollTop: $(target).offset().top
        }, "fast");
        return false;
    });
});