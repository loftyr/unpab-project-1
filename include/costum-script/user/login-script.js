$(document).ready(function () {
    $('.btnPressMe').click(function () {
        $('.side-right').removeClass('fadeOutRight');
        $('.side-left').removeClass('fadeInLeft');

        $('.side-right').addClass('fadeInRight in');
        $('.side-left').addClass('fadeOutLeft');
    })

    $('.btnPressBack').click(function () {
        $('.side-right').removeClass('fadeInRight');
        $('.side-left').removeClass('fadeOutLeft');

        $('.side-right').addClass('fadeOutRight');
        $('.side-left').addClass('fadeInLeft');
    })
})