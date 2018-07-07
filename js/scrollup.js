
$(function() {

    $("#goToTop").hover(function () {
        $(this).css({
            "background-color": "#2cb1ba",
            "color": "white"
        })
    }, function () {
        $(this).css({
            "background-color": "rgba(204, 204, 204, 0.6)",
            "color": "#b3b3b3"
        })
    }).click(function () {
        $('#goToTop').css({
            "background-color": "#2cb1ba",
            "color": "white"
        });

        $('body,html').animate({
            scrollTop: 0
        }, 800, function () {
            $('#goToTop').css({
                "background-color": "rgba(204, 204, 204, 0.6)",
                "color": "#b3b3b3"
            });
        });
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('#goToTop').fadeIn();
        } else {
            $('#goToTop').fadeOut();
        }
    });
});