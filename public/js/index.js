$('body').hide();

$(document).ready(function () {
    $('body').show();

    $('#backToTop').hide();

    $(window).scroll(function () {
        if ($(window).scrollTop() < 150) {
            $('#backToTop').hide();
        } else {
            $('#backToTop').fadeIn();
        }
    });

    $('#backToTop').click(function () {
        $(window).scrollTop(0);
    });

});
