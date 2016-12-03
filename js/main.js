var initImgSize = 200;
var curImageSize = initImgSize;
var minOpacity = 0.2;

function resize() {
    var viewportWidth = $(window).width();

    var div = Math.floor(viewportWidth / initImgSize);
    var rem = viewportWidth % initImgSize;

    curImageSize = initImgSize + rem / div;

    $('.img-bgr').width(curImageSize).height(curImageSize);

    // link for more-photos
    var topPosition = $('#background_wrapper').height() - 62;

    $('.more-photos').css({'top': topPosition+'px', 'display': 'block'});
}
$(document).ready(function () {


    for (var i = 0; i < 500; i++) {
        $('#background').append('<div id="img_bgr_' + i + '" class="img-bgr img-bgr-' + i + '" data-img-number="' + i + '"></div>')
    }
    resize();

    $('.img-bgr').each(function (index) {
        $(this).append('<img class="img-inst" src="./media/numbered/' + index + '.jpg"/>');
    });

    $(".img-inst").on("load", function () {
        $(this).parent().animate({
            opacity: minOpacity
        }, 3000);
    }).each(function () {
        if (this.complete) {
            $(this).trigger("load")
        }
    });


    var currentMousePos = {x: -1, y: -1};
    var lastSeen;
    $(document).mousemove(function (event) {
        var viewportWidth = $(window).width();
        var numImages = Math.floor(viewportWidth / curImageSize);
        currentMousePos.x = event.pageX;
        currentMousePos.y = event.pageY;

        var column = Math.floor(currentMousePos.x / curImageSize);
        var row = Math.floor(currentMousePos.y / curImageSize);

        var imgNum = row * numImages + column;

        if (lastSeen != imgNum) {


            $('#img_bgr_' + lastSeen).animate({
                opacity: minOpacity
            }, 500);

            lastSeen = imgNum;
            $('#img_bgr_' + lastSeen).animate({
                opacity: 1
            }, 1000);
        }
    });

});


$(window).resize(function () {
    resize();
});
