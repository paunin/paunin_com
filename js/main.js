var initImgSize = 200;
function resize() {
    var viewportWidth = $(window).width();
    var viewportHeight = $(window).height();

    var div = Math.floor(viewportWidth / initImgSize);
    var rem = viewportWidth % initImgSize;

    var newSize = initImgSize + rem / div;

    console.log(newSize);
    $('.img-bgr').width(newSize).height(newSize);
}
$(document).ready(function () {


    for (var i = 0; i < 120; i++) {
        $('#background').append('<div class="img-bgr" data-img-number="' + i + '"></div>')
    }
    resize();

    $('.img-bgr').each(function (index) {
        $(this).append('<img class="img-inst" src="./media/' + index + '.jpg"/>');
    });

    $(".img-inst").on("load", function () {
        $(this).parent().animate({
            opacity: 0.9
        }, 3000);
    }).each(function () {
        if (this.complete) {
            $(this).trigger("load")
        }
    });

});


$(window).resize(function () {
    resize();
});
